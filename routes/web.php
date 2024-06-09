<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    $posts = [];
    if (auth()->check()) {
        $posts = auth()->user()->usersCoolPosts()->latest()->get();
    }
    return view('home', ['posts' => $posts]);

//    $posts =  Post::where('user_id', auth()->id())->get(); 
   
});

//for register user
Route::post('/register', [UserController::class, 'register']);

//for logout user
Route::post('/logout', [UserController::class, 'logout']);

//for login user
Route::post('/login', [UserController::class, 'login']);




// blog post related routes
Route::post('create-post', [PostController::class,'createPost']);

Route::get('/edit-post/{post}', [PostController::class,'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class,'showUpdatedPost']);
Route::delete('/delete-post/{post}', [PostController::class,'deletePost']);