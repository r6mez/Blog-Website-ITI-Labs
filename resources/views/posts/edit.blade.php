@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <h1 class="mb-4">Edit Post</h1>
    <div class="card mb-3">
        <div class="card-body">
            <p class="text-muted mb-0">Editing post as: <strong>{{ Auth::user()->name }}</strong></p>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('posts.update', $post['id']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post['title'] }}" required>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" id="body" name="body" rows="3" required>{{ $post['body'] }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($post->image)
                <br>
                <img src="{{ url('storage/' . $post->image) }}" alt="Post Image" width="100">
            @endif
        </div>
        <input type="hidden" name="posted_by" value="{{ Auth::user()->id }}">
        @if ($post->posted_by == auth()->id())
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        @endif
    </form>
@endsection
