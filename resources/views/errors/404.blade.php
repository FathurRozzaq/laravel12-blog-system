<x-layout>
  <x-slot:title>404: Halaman Tidak Ditemukan</x-slot:title>
  <div class="flex min-h-screen items-center justify-center bg-gray-100">
        <div class="max-w-md rounded-lg bg-white p-8 text-center shadow-lg">
            <h1 class="text-9xl font-bold text-gray-900">404</h1>
            <h2 class="mt-4 text-3xl font-semibold text-gray-800">Halaman Tidak Ditemukan</h2>
            <p class="mt-2 text-gray-600">
                Maaf, halaman yang Anda cari mungkin telah dipindahkan atau tidak ada lagi.
            </p>
            
            {{-- Tombol ini akan berfungsi dengan wire:navigate --}}
            <a wire:navigate 
               href="/" 
               class="mt-6 inline-block rounded bg-blue-500 px-5 py-2 font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring">
                Kembali ke Beranda
            </a>
        </div>
    </div>
</x-layout>