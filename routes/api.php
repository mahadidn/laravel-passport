<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware(['auth:api', 'scopes:get-email']);

Route::middleware(['auth:api', 'scopes:create-posts'])->post('/posts/new', function(Request $request){
    return $request->user()->posts()->create($request->only(['title', 'content']));
});

Route::get('/posts', function(){
    return Post::with('user')->get()->toJson();
});