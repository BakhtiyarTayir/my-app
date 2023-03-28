<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::where('is_published', 1)->get();
        foreach ($posts as $post) {
            dump($post->title);
        }
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
}
