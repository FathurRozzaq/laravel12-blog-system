<?php
namespace App\Models;

use Illuminate\Support\Arr;

  class Post {
    public static function all() {
        return [
        [
            'id' => 1,
            'slug' => 'pergerakan-harga-koin-crypto',
            'title'  => 'Pergerakan Harga Koin Crypto',
            'author' => 'Path Founder',
            'body'   => 'Solana, BNB, XRP merupakan mata uang crypto yang sudah bertahan selama lebih dari 5 tahun. Pergerakkan harganya
                    masih tergolong mengikuti trend pergerakan harga bitcoin. Kalau harga bitcoin naik, harga koin-koin tersebut
                    kemungkinan besar akan naik, begitu pula kalau bitcoin turun, harga mereka akan turun juga.',
        ],
        [
            'id' => 2,
            'slug' => 'memahami-teknologi-di-balik-nft',
            'title'  => 'Memahami Teknologi di Balik NFT',
            'author' => 'Crypto Today',
            'body'   => 'Non-Fungible Token, atau NFT, telah mengubah cara kita melihat kepemilikan digital. Berbeda dari mata uang kripto seperti Bitcoin, setiap NFT unik dan tidak dapat dipertukarkan. Teknologi ini bergantung pada blockchain, biasanya Ethereum, untuk memverifikasi keaslian dan melacak riwayat kepemilikan.',
        ],
        [
            'id' => 3,
            'slug' => 'apa-itu-the-merge-ethereum',
            'title'  => 'Apa Itu \'The Merge\' Ethereum?',
            'author' => 'Blockchain Weekly',
            'body'   => 'Pembaruan "The Merge" adalah transisi besar jaringan Ethereum dari mekanisme konsensus Proof-of-Work (PoW) ke Proof-of-Stake (PoS). Langkah ini bertujuan untuk secara drastis mengurangi konsumsi energi jaringan, meningkatkan skalabilitas, dan mempersiapkan pembaruan di masa depan. Ini adalah salah satu peristiwa paling ditunggu dalam sejarah kripto.',
        ],
        [
            'id' => 4,
            'slug' => 'masa-depan-keuangan-terdesentralisasi-defi',
            'title'  => 'Masa Depan Keuangan Terdesentralisasi (DeFi)',
            'author' => 'Path Founder',
            'body'   => 'DeFi, atau Keuangan Terdesentralisasi, merujuk pada ekosistem aplikasi keuangan yang dibangun di atas jaringan blockchain. Tujuannya adalah untuk menciptakan kembali sistem keuangan tradisional—seperti pinjaman, tabungan, dan perdagangan—tanpa memerlukan perantara terpusat seperti bank atau lembaga keuangan lainnya.',
        ]
    ];}
    
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
    public static function find($slug){
      $post = Arr::first(static::all(), fn($post) => $post['slug'] == $slug);

      if (!$post) {
          abort(404);
      } else {
          return $post;
      }
    }
}
?>