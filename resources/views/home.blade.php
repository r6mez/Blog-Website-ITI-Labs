<?php use Carbon\Carbon; ?>

@extends('layouts.app')

@section('title', 'Welcome')

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
            <th>Image</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post['id'] }}</td>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post['body'] }}</td>
                <td>
                    @if($post->image)
                        <img src="{{ url('storage/' . $post->image) }}" alt="Post Image" width="100">
                    @else

                    @endif
                </td>
                <td>{{ Carbon::parse($post['created_at'])->format('Y-d-m') }}</td>
                <td>
                    @if($post->trashed())
                        <form action="{{ route('posts.restore', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-secondary">Restore</button>
                        </form>
                    @else 
                        <a href="{{ route('posts.show', $post['id']) }}" class="btn btn-info" style="margin: 5px;">View</a>
                        @if ($post->posted_by == auth()->id())
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning" style="margin: 5px;">Update</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;" onsubmit="confirmDelete(event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="margin: 5px;">Delete</button>
                            </form>
                        @endif
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $posts->links('pagination::bootstrap-4') }}
</div>
@endsection

<script>
    function confirmDelete(event) {
        event.preventDefault();
        if (confirm('Are you sure you want to delete this post?')) {
            event.target.submit();
        }
    }
</script>