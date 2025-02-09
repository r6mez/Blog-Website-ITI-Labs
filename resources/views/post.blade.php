@extends('layouts.app')

@section('title', 'Post Details')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $post['title'] }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Posted by {{ $post['posted_by'] }} on {{ $post['created_at'] }}</h6>
            <p class="card-text">{{ $post['body'] }}</p>
            <a href="{{ route('posts.index') }}" class="btn btn-primary">Back to Posts</a>
        </div>
    </div>
@endsection
