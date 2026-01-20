<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    // The attributes that are mass assignable.
    protected $fillable = ['title', 'slug', 'author', 'category', 'body'];

    protected $with = ['author', 'category']; //Eager Loading Default: setiap kali model Post diambil, relasi author dan category akan otomatis dimuat bersama-sama tanpa perlu memanggilnya secara eksplisit.

    /**
     * Get the author that owns the post.
     */
    public function author() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category that owns the post.
     */
    public function category() : BelongsTo {
        return $this->belongsTo(Category::class);
    }
    
    public function scopeFilter(Builder $query, array $filters): void 
    {
        // Mengecek apakah ada filter 'search' di dalam array $filters.
        // operator '??' (null coalescing) memastikan tidak error jika key 'search' tidak ada (return false).
        $query->when(
            $filters['search'] ?? false, 
            
            // Jika ada 'search', jalankan closure (fungsi anonim) ini:
            fn ($query, $search) => 
                // Cari postingan yang judulnya mengandung kata pencarian (partial match)
                $query->where('title', 'like', '%' . $search . '%')
        );

        // Mengecek apakah ada filter 'category'
        $query->when(
            $filters['category'] ?? false, 

            // Jika ada 'category', jalankan closure ini:
            fn ($query, $category) => 
                // whereHas digunakan untuk memfilter berdasarkan relasi.
                // "Ambil Post yang punya Category, dimana slug category-nya sesuai request"
                $query->whereHas('category', fn ($query) => 
                    $query->where('slug', $category)
                )
        );

        // Mengecek apakah ada filter 'author'
        $query->when(
            $filters['author'] ?? false,

            // Jika ada 'author', jalankan closure ini:
            fn ($query, $author) =>
                // whereHas digunakan untuk memfilter berdasarkan relasi.
                // "Ambil Post yang punya Author, dimana id author-nya sesuai request"
                $query->whereHas('author', fn ($query) =>
                    $query->where('username', $author)
                )
        );
    }
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
}
