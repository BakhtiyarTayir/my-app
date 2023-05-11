@extends('layouts.main')
@section('content')
    <form action="{{ route('store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title"  class="form-control" id="title" placeholder="Title">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="content" placeholder="Content"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="image">Image</label>
            <input type="text" name="image" class="form-control" id="image">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
