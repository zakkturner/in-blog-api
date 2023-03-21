<?php

use App\Http\Controllers\BlogPostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \Laravel\Socialite\Facades\Socialite;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/user/posts', function(){
        $posts = auth()->user()->posts;
        $posts->map(function ($post) {
            $post->user = $post->user()->select('id', 'name')->first();
            $post->post_image = $post->post_image;
            return $post;
        });
        return $posts;
    });

    Route::get('/postsAuth/{post}', [BlogPostController::class, 'edit']);
    Route::patch('/post/{post}', [BlogPostController::class, 'update']);
    Route::delete('/post/{post}', [BlogPostController::class, 'destroy']);
});
Route::post('/post', [BlogPostController::class, 'store']);
Route::get('/auth/redirect', function(){
    return Socialite::driver('github')->redirect();
});
Route::get('/posts', [BlogPostController::class, 'index']);
Route::get('/posts/{post}', [BlogPostController::class, 'show']);

