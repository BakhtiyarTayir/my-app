@extends('layouts.main')
@section('content')
    <div class="mb-3 single-post">
        <h2> {{ $post->title }} </h2>
        <p>{{$post->content }}</p>
        <p>{{$post->image }}</p>
    </div>
    <div class="d-flex gap-3 mb-3">
        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('index') }}" class="btn btn-outline-primary">back</a>
        <form action="{{ route('post.delete', $post->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Delete" class="btn btn-danger">
        </form>
    </div>


@endsection
