<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About', 'nama' => 'Path Founder']);
});

Route::get('/posts', function () {
    // $post = Post::with(['author', 'category'])->get(); //eager loading untuk mengurangi query ke database saat mengambil relasi author dan category. Cara kerja: dengan menambahkan method with() sebelum get(), laravel akan mengambil data relasi author dan category bersamaan dengan data post dalam satu query.

    return view('posts', ['title' => 'Blog', 'posts' => Post::all()]); //mengirim semua data post ke view posts
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


/* Author's Posts Route 
    cara kerja:
    1. ketika route diakses, laravel akan mencari user berdasarkan id yang dikirim di url
    2. laravel akan membuat instance user dan mengisinya dengan data user yang ditemukan
    3. kemudian laravel akan memanggil relasi posts() pada model User untuk mendapatkan semua post yang ditulis oleh user tersebut
    4. akhirnya laravel akan mengirim data user dan posts ke view 'posts' untuk ditampilkan
*/
Route::get('/authors/{user:username}', function(User $user ){ 
    // $posts = $user->posts->load('category','author'); //load digunakan untuk eager loading relasi category dan author pada collection posts yang sudah diambil sebelumnya. Berbeda dengan with() yang digunakan sebelum pengambilan data, load() digunakan setelah data diambil untuk memuat relasi tambahan sebaba data posts sudah ada.

    return view('posts', ['title' => count($user->posts). ' Articles by ' . $user->name, 'posts'=>$user->posts]);//memanggil relasi posts dari model user
});

/* Category's Posts Route 
    cara kerja:
    1. ketika route diakses, laravel akan mencari category berdasarkan id yang dikirim di url
    2. laravel akan membuat instance category dan mengisinya dengan data category yang ditemukan
    3. kemudian laravel akan memanggil relasi posts() pada model Category untuk mendapatkan semua post yang berada di category tersebut
    4. akhirnya laravel akan mengirim data category dan posts ke view 'posts' untuk ditampilkan
*/
Route::get('/categories/{category:slug}', function(Category $category ){ 
    // $posts = $category->posts->load('category','author'); //load digunakan untuk eager loading relasi category dan author pada collection posts yang sudah diambil sebelumnya. Berbeda dengan with() yang digunakan sebelum pengambilan data, load() digunakan setelah data diambil untuk memuat relasi tambahan sebaba data posts sudah ada.

    return view('posts', ['title' => count($category->posts). ' Articles in Category: ' . $category->name, 'posts'=>$category->posts]);//memanggil relasi posts dari model category
});