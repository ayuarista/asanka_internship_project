<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;



Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});
// Route::get('/posts', [PostController::class, 'index'])->name('posts.index');


Route::resource('posts', PostController::class);


// Route::get('/posts/{post:slug}', function (Post $post) {
//     return view('post', ['title' => 'Single Post', 'post' => $post]);
// });
Route::get('/authors/{user:username}', function (User $user) {
    // $posts = $user->posts->load('category', 'author');
    return view('posts', [
        'title' => count($user->posts) .
        ' Articles by ' . $user->name,
        'posts' => $user->posts
    ]);
});

Route::get('/categories/{category:slug}', [CategoryController::class, 'show']);



