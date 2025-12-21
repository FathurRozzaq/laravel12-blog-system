<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    // The attributes that are mass assignable.
    protected $fillable = ['title', 'slug', 'author', 'excerpt', 'body'];

    /**
     * Get the author that owns the post.
     */
    public function author() : BelongsTo {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
