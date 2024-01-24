@extends('layout.header')
@section('title', 'News-show')

@section('content')
    <div class=" container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('posts.update', $post) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" value="{{ $post->title }}" name="title" class="form-control"
                    id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ $post->description }}</textarea>
            </div>
            <select name="postcreate" class="form-select" aria-label="Default select example">
                @foreach ($users as $user)
                    <option @selected($post->user_id == $user->id) value="{{ $user->id }}">{{ $user->name }}
                    </option>
                @endforeach

            </select>
            <button type="submit" class="btn btn-success my-3">Edit Post</button>
        </form>
    </div>

@endsection
