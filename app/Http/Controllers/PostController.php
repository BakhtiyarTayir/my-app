<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
//        $category = Category::find(1);
//        $posts = Post::find(3);
//        $tag = Tag::find(1);
        $posts = Post::all();
        $categories = Category::all();
        return view('post.index', compact('posts', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
        ]);
        Post::create($data);
        return redirect()->route('index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('post.edit', compact('post', 'categories'));

    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);

    }

    public function delete()
    {
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('deleted');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('index');
    }

    public function firstOrCreate()
    {
        $post = Post::firstOrCreate([
            'title' => 'some title w',
        ],
            [
                'title' => 'some title',
                'content' => 'some content',
                'image' => 'some image2.jpg',
                'likes' => 500,
                'is_published' => 1

        ]);

        dump($post->content);
        dd('finished');
    }

    public function updateOrCreate()
    {
        $post = Post::updateOrCreate(
            [
                'title' => 'create title',
            ],
            [
                'title' => 'update title',
                'content' => 'update content',
                'image' => 'update image2.jpg',
                'likes' => 5050,
                'is_published' => 1
            ]
        );
        dd('updated');
    }
}
