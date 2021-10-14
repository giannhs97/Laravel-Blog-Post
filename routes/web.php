<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterControler;
use App\Http\Controllers\DashboardControler;
use App\Http\Controllers\Auth\LoginControler;
use App\Http\Controllers\Auth\LogoutControler;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;

Route :: get('/', function(){
    return view('home');
} ) -> name('home');

Route :: get('/dashboard',[DashboardControler :: class, 'index'] ) 
-> name('dashboard')
-> middleware('auth');

Route :: get('/register',[RegisterControler :: class, 'index'] ) 
-> name('register')
-> middleware('guest');
Route :: post('/register',[RegisterControler :: class, 'store'] );

Route :: get('/login',[LoginControler :: class, 'index'] )
-> name('login')
-> middleware('guest');
Route :: post('/login',[LoginControler :: class, 'store'] );

Route :: post('/logout',[LogoutControler :: class, 'store'] ) -> name('logout');

Route :: get('/posts',[PostController :: class, 'index'] ) -> name('posts');
Route :: post('/posts',[PostController :: class, 'store'] );
Route :: delete('/posts/{post}',[PostController :: class, 'destroy'] ) -> name('posts.destroy');

Route :: post('/posts/{post}/likes',[PostLikeController :: class, 'store'] ) -> name('posts.likes');
Route :: delete('/posts/{post}/likes',[PostLikeController :: class, 'destroy'] ) -> name('posts.likes');

Route :: get('/users/{user:name}/posts',[UserPostController :: class, 'index'] ) -> name('users.posts');