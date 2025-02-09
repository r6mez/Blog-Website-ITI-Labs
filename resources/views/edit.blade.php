@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <h1 class="mb-4">Edit Post</h1>
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
    <form action="{{ route('posts.update', $post['id']) }}" method="POST">
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
            <label for="posted_by">Posted By</label>
            <select class="form-control" id="posted_by" name="posted_by" required>
                @foreach ($users as $user)
                    <option value="{{ $user->name }}" {{ $user->name == $post['posted_by'] ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
