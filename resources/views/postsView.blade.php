<?php use Carbon\Carbon; ?>

@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <h1 class="mb-4">Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create Post</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Posted By</th>
                <th>Body</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post['id'] }}</td>
                    <td>{{ $post['title'] }}</td>
                    <td>{{ $post['posted_by'] }}</td>
                    <td>{{ $post['body'] }}</td>
                    <td>{{ Carbon::parse($post['created_at'])->format('Y-d-m') }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post['id']) }}" class="btn btn-info" style="margin: 5px;">View</a>
                        <a href="{{ route('posts.edit', $post['id']) }}" class="btn btn-warning" style="margin: 5px;">Update</a>
                        <form action="{{ route('posts.destroy', $post['id']) }}" method="POST" style="display:inline;" onsubmit="confirmDelete(event)">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="margin: 5px;">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

<script>
    function confirmDelete(event) {
        event.preventDefault();
        if (confirm('Are you sure you want to delete this post?')) {
            event.target.submit();
        }
    }
</script>