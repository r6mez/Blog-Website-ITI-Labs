@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Posted by {{ $post->user->name }} on {{ $post->created_at }}</h6>
            <p class="card-text">{{ $post->body }}</p>
            <a href="{{ route('posts.index') }}" class="btn btn-primary">Back to Posts</a>
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
