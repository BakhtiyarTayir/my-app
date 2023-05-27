@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <a href="{{ route('post.create') }}" class="btn btn-primary mb-3">Add one</a>
            @foreach($posts as $post)
                <h3><a href="{{ route('post.show', $post->id) }}">{{ $post->id }}. {{ $post->title }} </a></h3>
            @endforeach

            <div class="mt-4">
                {{ $posts->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection
