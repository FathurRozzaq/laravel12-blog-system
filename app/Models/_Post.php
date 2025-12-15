<?php
namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

  class Post extends Model{
    
    protected $fillable = ['title', 'slug', 'author', 'excerpt', 'body']; //Mass Assignment: menentukan atribut mana yang boleh diisi secara massal (mass assignable) saat membuat atau memperbarui instance model melalui eloquent. Ini membantu melindungi terhadap serangan mass assignment dengan membatasi atribut yang dapat diisi melalui input pengguna.
    
    /**
     * Cari posting berdasarkan slug.
     *
     * Mengambil seluruh koleksi posting dari model (static::all()) lalu melakukan iterasi
     * untuk mencari posting yang memiliki atribut 'slug' sama dengan parameter yang diberikan.
     * Mengembalikan instance model pertama yang cocok, atau null jika tidak ditemukan.
     *
     * Catatan:
     * - Implementasi ini memuat semua posting ke memori dan melakukan pencarian linear,
     *   sehingga tidak efisien untuk dataset yang besar.
     * - Untuk performa lebih baik, sebaiknya gunakan kueri langsung ke database, mis.
     *   Post::where('slug', $slug)->first(), sehingga memanfaatkan indexing dan menghindari
     *   pemuatan seluruh koleksi.
     *
     * @param string $slug Slug posting yang dicari.
     * @return static|null Instance model yang cocok, atau null jika tidak ditemukan.
     */
    // public static function find($slug) {
    //     $posts = static::all();
    //     foreach($posts as $post) {
    //         if($post['slug'] === $slug) {
    //             return $post;
    //         }
    //     }
    //     return null;
    // }
    
    /**
     * Cari dan kembalikan post berdasarkan slug.
     *
     * Mencari entri pertama dari koleksi post (diperoleh dari static::all())
     * yang memiliki nilai 'slug' sama dengan parameter yang diberikan.
     * Jika ditemukan, mengembalikan array yang merepresentasikan post tersebut;
     * jika tidak ditemukan, mengembalikan null.
     *
     * @param string $slug Slug unik dari post yang dicari.
     * @return array|null Array yang merepresentasikan post yang cocok, atau null jika tidak ada.
     */
    // public static function find($slug){
    //   $post = Arr::first(static::all(), function ($post) use ($slug) {
    //     return $post['slug']==$slug;
    //   });
    //   return $post;
    // }

    /**
     * Mencari posting berdasarkan slug.
     *
     * Mengembalikan entri pertama dari daftar yang diperoleh melalui static::all()
     * yang memiliki nilai 'slug' sama persis dengan parameter $slug. Perbandingan
     * menggunakan operator identik (===), sehingga pencarian bersifat case-sensitive
     * dan sensitif terhadap tipe data.
     *
     * @param string $slug Slug posting yang dicari.
     * @return array|null Array data posting yang cocok, atau null jika tidak ditemukan.
     *
     * Catatan:
     * - Fungsi ini melakukan iterasi linear terhadap seluruh entri (kompleksitas O(n)).
     * - Bergantung pada Arr::first dan static::all() untuk pengambilan dan pemilahan data.
     */
    // public static function find($slug){
    //   $post = Arr::first(static::all(), fn($post) => $post['slug'] == $slug);

    //   if (!$post) {
    //       abort(404);
    //   } else {
    //       return $post;
    //   }
    // }
}
?>