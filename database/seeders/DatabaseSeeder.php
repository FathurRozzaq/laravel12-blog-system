<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // Post::create([
        //     'title' => 'Mie Rebus Jahe Hangat',
        //     'slug' => 'mie-rebus-jahe-hangat',
        //     'body' => 'Resep mie rebus jahe hangat adalah hidangan yang sempurna untuk menghangatkan tubuh di hari yang dingin. Dengan perpaduan mie kenyal dan jahe segar, hidangan ini tidak hanya lezat tetapi juga menyehatkan. Jahe dikenal memiliki sifat anti-inflamasi dan dapat membantu meredakan sakit tenggorokan serta meningkatkan sistem kekebalan tubuh. Untuk membuat mie rebus jahe hangat, pertama-tama rebus mie hingga matang, lalu tiriskan. Selanjutnya, siapkan kuah dengan merebus air bersama potongan jahe, bawang putih, dan bumbu-bumbu pilihan seperti garam, merica, dan kecap asin. Setelah kuah mendidih dan harum, masukkan mie ke dalam mangkuk saji dan tuangkan kuah jahe hangat di atasnya. Tambahkan irisan daun bawang, seledri, atau telur rebus sebagai pelengkap. Hidangan ini siap dinikmati untuk memberikan kehangatan dan kenyamanan di setiap suapan.',
        //     'category_id' => 2,
        //     'author_id' => 1,
        // ]);

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
        ]);
        Post::factory(100)->recycle(
            [
                User::all(),
                Category::all(),
            ]
        )->create();
    }
}
