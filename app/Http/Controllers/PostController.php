<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('posts', compact('posts'));
    }

    public function create()
    {
        $postsArr = [
            [
                'title' => 'title posts of from phpstorm',
                'content' => 'some interesting content',
                'image' => 'image1.jpg',
                'likes' => 10,
                'is_published' => 1
            ],
            [
                'title' => 'another title posts of from phpstorm',
                'content' => 'another some interesting content',
                'image' => 'image2.jpg',
                'likes' => 50,
                'is_published' => 1
            ]
        ];

        foreach ($postsArr as $item) {
            Post::create($item);
        }
        dd('created');
    }

    public function update()
    {
        $post = Post::find(1);
        $post->update([
            'title' => 'update',
            'content' => 'update',
            'image' => 'image_update.jpg',
            'likes' => 500,
            'is_published' => 1
        ]);
        dd($post->title);
    }

    public function delete()
    {
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('deleted');
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
