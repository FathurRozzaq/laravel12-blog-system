<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
        ]);

        Category::create([
            'name' => 'AI Programming',
            'slug' => 'ai-programming',
        ]);

        Category::create([
            'name' => 'Cooking',
            'slug' => 'cooking',
        ]);

        Category::create([
            'name' => 'Investing',
            'slug' => 'investing',
        ]);

        Category::create([
            'name' => 'Travel',
            'slug' => 'travel',
        ]);

        Category::create([
            'name' => 'Lifestyle',
            'slug' => 'lifestyle',
        ]);
    }
    
}
