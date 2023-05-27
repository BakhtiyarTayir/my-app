<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace'=> ''], function (){
    Route::get('/posts', [\App\Http\Controllers\Post\IndexController::class, '__invoke'])->name('index');
    Route::get('/posts/create', [\App\Http\Controllers\Post\CreateController::class, '__invoke'])->name('post.create');

    Route::post('/posts', [\App\Http\Controllers\Post\StoreController::class, '__invoke'])->name('store');
    Route::get('/posts/{post}', [\App\Http\Controllers\Post\ShowController::class, '__invoke'])->name('post.show');
    Route::get('/posts/{post}/edit', [\App\Http\Controllers\Post\EditController::class, '__invoke'])->name('post.edit');
    Route::patch('/posts/{post}', [\App\Http\Controllers\Post\UpdateController::class, '__invoke'])->name('post.update');
    Route::delete('/posts/{post}', [\App\Http\Controllers\Post\DestroyController::class, '__invoke'])->name('post.delete');
});

Route::group(['namespace'=> '', 'prefix'=> 'admin', 'middleware'=>'admin'], function() {
    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, '__invoke'])->name('admin');
    Route::group(['namespace'=> 'Post'], function () {
            Route::get('/post', [\App\Http\Controllers\Admin\Post\IndexController::class, '__invoke'])->name('admin.post.index');
    });
});



Route::get('/posts/update', [\App\Http\Controllers\PostController::class, 'update']);
Route::get('/posts/delete', [\App\Http\Controllers\PostController::class, 'delete']);
Route::get('/posts/first_or_create', [\App\Http\Controllers\PostController::class, 'firstOrCreate']);
Route::get('/posts/update_or_create', [\App\Http\Controllers\PostController::class, 'updateOrCreate']);

Route::get('/main', [\App\Http\Controllers\MainController::class, 'index'])->name('main');
Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/contact', [\App\Http\Controllers\ContactsController::class, 'index'])->name('contact');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
