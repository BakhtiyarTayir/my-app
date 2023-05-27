<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Post\BaseController;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Category;
use App\Models\Post;


class AdminController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {

        $data = $request->validated();

        $filter = app()->make(PostFilter::class, ['queryParams'=>array_filter($data)]);

        $posts = Post::filter($filter)->paginate();

        $categories = Category::all();
        return view('admin.index', compact('posts'));
    }
}
