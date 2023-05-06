@extends('layouts.main')
@section('content')
    <ul>
        @foreach($posts as $post)
            <li> <h2> {{ $post->title }} </h2> </li>
        @endforeach
    </ul>
@endsection
