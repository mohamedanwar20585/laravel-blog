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
        <form action="{{ route('posts.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" value="{{ old('title') }}" name="title" class="form-control"
                    id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ old('description') }}</textarea>
            </div>
            <select name="postcreate" class="form-select" aria-label="Default select example">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach

            </select>
            <button type="submit" class="btn btn-success my-3">Create Post</button>
        </form>
    </div>

@endsection
