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

// ---------------------------------------------------------------------
    // DOKUMENTASI & ALUR KERJA:
    // Silakan Ctrl + Klik pada path di bawah ini untuk membuka penjelasannya:
    //
    // resources/views/algoritma_belajar/search.docx
    // ---------------------------------------------------------------------
    //
    // Menggunakan scope filter. 
    // request(['search', 'category']) akan mengambil query string... ?search=.. dan ?category=.. 
    // lalu mengirimnya sebagai array ke scopeFilter di model.
    // alur kerja search secara detail ada di resources\views\algoritma untuk belajar\search.docx
Route::get('/posts', function () {
    $posts = Post::latest()->filter(request(['search', 'category', 'author']))->get();

    return view('posts', ['title' => 'Blog', 'posts' => $posts]);
});


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