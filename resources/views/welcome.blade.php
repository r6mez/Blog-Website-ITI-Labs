@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div class="text-center">
        <h1>Welcome</h1>
        <h2>Let's CRUD The Posts!</h2>
        <a href="{{ route('posts.index') }}" class="btn btn-primary mt-3">View Posts</a>
    </div>
@endsection
