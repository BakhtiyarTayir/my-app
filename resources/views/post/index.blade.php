@extends('layouts.main')
@section('content')
    <div>
        <a href="{{ route('post.create') }}" class="btn btn-primary mb-3">Add one</a>
        @foreach($posts as $post)
            <h3><a href="{{ route('post.show', $post->id) }}">{{ $post->id }}. {{ $post->title }} </a></h3>
        @endforeach
    </div>
@endsection
