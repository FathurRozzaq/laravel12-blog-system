<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    // The attributes that are mass assignable.
    protected $fillable = ['name', 'slug'];
    
    /**
     * Get the posts for the category.
     */
    public function posts(): HasMany {
        return $this->hasMany(Post::class, 'category_id');
    }

    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
}
