<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
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
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post =  Post::create($data);

        $post->tags()->attach($tags);

        return redirect()->route('index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));

    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);

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
