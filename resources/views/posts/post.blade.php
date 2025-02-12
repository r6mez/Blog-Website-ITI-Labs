@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $post->title }}</h4>
            <h6 class="card-subtitle mb-2 text-muted"><strong>{{ $post->user->name }}</strong> - {{ $post->human_readable_date }}</h6>
            <h6 class="card-subtitle mb-2 text-muted"></h6>
            <p class="card-text">{{ $post->body }}</p>
            @if($post->image)
                <img src="{{ Storage::url($post->image) }}" alt="Post Image" width="300">
            @endif
            <br>
            <br>
            <a href="{{ route('posts.index') }}" class="btn btn-primary">Back to Posts</a>
            @if ($post->posted_by == auth()->id())
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endif
        </div>
    </div>
@endsection
