@extends('layout.header')
@section('title', 'News-show')

@section('content')

    <div class=" container my-3 p-5  bg-body-tertiary rounded-3">
        <h1 class="text-body-emphasis">{{ $post->title }}</h1>
        <p class="col-lg-8  fs-5 text-muted">{{ $post->description }} </p>
        <h5 class="card-title">Name : {{ $post->user ? $post->user->name : 'not found' }} </h5>
        <p class="card-text">Email : {{ $post->user ? $post->user->email : 'not found' }}</p>
        <p class="card-text">Create At : {{ $post->user ? $post->user->created_at : 'not found' }}</p>
        <div class="d-inline-flex gap-2 mb-5">
            <a class="btn btn-outline-primary btn-lg px-4 rounded-pill" href="{{ route('posts.edit', $post) }}">
                edit
            </a>
            <a class="btn btn-outline-danger btn-lg px-4 rounded-pill" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Delete Post
            </a>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Post</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure delete post ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="{{ route('posts.destroy', $post) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete Post</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
