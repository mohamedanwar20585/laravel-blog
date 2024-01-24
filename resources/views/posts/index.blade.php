@extends('layout.header')
@section('title', 'News-home')

@section('content')
    @foreach ($posts as $post)
        <div class=" container my-3 p-5  bg-body-tertiary rounded-3">
            <h1 class="text-body-emphasis">{{ $post->title }}</h1>
            <p class="col-lg-8  fs-5 text-muted">{{ $post->description }} </p>
            <h5 class="card-title">Name : {{ $post->user ? $post->user->name : 'not found' }} </h5>
            <p class="card-text">Email : {{ $post->user ? $post->user->email : 'not found' }}</p>
            <p class="card-text">Create At : {{ $post->created_at }}</p>
            <div class="d-inline-flex gap-2 mb-5">
                <a class="btn btn-outline-secondary btn-lg px-4 rounded-pill" href="{{ route('posts.show', $post) }}">
                    See More
                </a>
            </div>


        </div>
    @endforeach
@endsection
