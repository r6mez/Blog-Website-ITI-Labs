@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <h1 class="mb-4">Create Post</h1>
    <div class="card mb-3">
        <div class="card-body">
            <p class="text-muted mb-0">Creating post as: <strong>{{ Auth::user()->name }}</strong></p>
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
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" id="body" name="body" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <input type="hidden" name="posted_by" value="{{ auth()->user()->id }}">
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@endsection
