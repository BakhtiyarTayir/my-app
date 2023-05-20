@extends('layouts.main')
@section('content')
    <form action="{{ route('store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" value="{{old('title')}}" name="title"  class="form-control" id="title" placeholder="Title">
            @error('title')
                <p  class="text-danger mb-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="content" placeholder="Content">{{old('content')}}</textarea>
            @error('content')
                <p  class="text-danger mb-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="image">Image</label>
            <input type="text"  value="{{old('image')}}"name="image" class="form-control" id="image">
            @error('image')
                <p  class="text-danger mb-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label=".form-select-sm example" name="category_id">

                @foreach($categories as $category)
                    <option
                        {{ old('category_id') == $category->id ? ' selected' : ''}}
                        value="{{ $category->id }}"> {{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <select multiple class="form-select" aria-label="select example" id="tags" name="tags[]">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{ $tag->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
