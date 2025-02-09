@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <h1 class="mb-4">Create Post</h1>
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
    <form action="{{ route('posts.store') }}" method="POST">
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
            <label for="posted_by">Posted By</label>
            <input type="text" class="form-control" id="posted_by" name="posted_by" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
