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
            'color' => 'blue',
        ]);

        Category::create([
            'name' => 'AI Programming',
            'slug' => 'ai-programming',
            'color' => 'green',
        ]);

        Category::create([
            'name' => 'Cooking',
            'slug' => 'cooking',
            'color' => 'red',
        ]);

        Category::create([
            'name' => 'Investing',
            'slug' => 'investing',
            'color' => 'yellow',
        ]);

        Category::create([
            'name' => 'Travel',
            'slug' => 'travel',
            'color' => 'purple',
        ]);

        Category::create([
            'name' => 'Lifestyle',
            'slug' => 'lifestyle',
            'color' => 'pink',
        ]);
    }
    
}
