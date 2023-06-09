@extends('layouts.main')
@section('content')
    <form action="{{ route('post.update', $post->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title"  class="form-control" id="title" placeholder="Title" value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="content" placeholder="Content">{{ $post->content }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="image">Image</label>
            <input type="text" name="image" class="form-control" id="image" value="{{ $post->image }}">
        </div>
        <div class="mb-3">
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="category_id">

                @foreach($categories as $category)
                    <option {{$category->id === $post->category_id ? ' selected': ''}}
                        value="{{ $category->id }}"> {{ $category->title }}</option>
                @endforeach

            </select>
        </div>
        <div class="mb-3">
            <select multiple class="form-select" name="tags[]" id="tags">
                @foreach($tags as $tag)
                    <option

                        @foreach($post->tags as $postTag )
                            {{ $tag->id === $postTag->id ? ' selected' : '' }}
                        @endforeach
                        value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
