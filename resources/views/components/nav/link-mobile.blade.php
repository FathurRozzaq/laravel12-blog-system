<a {{ $attributes }} wire:navigate
		class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium"
        {{-- aria-current berfungsi untuk menunjukkan halaman yang sedang aktif kepada screen reader, yaitu fitur yang membaca isi website ke dalam bentuk suara --}}
        aria-current="{{ $active ? 'page' : false }}" 
>
        {{ $slot }}
</a>
