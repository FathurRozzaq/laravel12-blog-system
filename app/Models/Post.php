<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'author', 'excerpt', 'body']; //Mass Assignment: menentukan atribut mana yang boleh diisi secara massal (mass assignable) saat membuat atau memperbarui instance model melalui eloquent. Ini membantu melindungi terhadap serangan mass assignment dengan membatasi atribut yang dapat diisi melalui input pengguna.

    use HasFactory;
}
