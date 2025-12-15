<?php

use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About', 'nama' => 'Path Founder']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => Post::all()]);
});

// Route::get('/posts/{id}', function($id){ //function find secara default gunakan id sebagai parameter slug untuk pencarian data
//     $post = Post::find($id);

//     return view('post', ['title' => 'SIngle Post', 'post'=>$post]);
// });

Route::get('/posts/{post:slug}', function(Post $post ){ //Model Binding by Slug: mencari data berdasarkan slug. Menggunakan type-hinting untuk otomatis mengikat parameter route ke model Post berdasarkan kolom 'slug'.

    return view('post', ['title' => 'Single Post', 'post'=>$post]);
});

Route::get('/contact', function () {
    return view('contact', [
        'title'     => 'Contact',
        'email'     => 'hairopantogreen@gmail.com',
        'instagram' => 'https://www.instagram.com/rozzaq22',
        'tiktok'    => 'https://www.tiktok.com/@pathto1t']);
});


