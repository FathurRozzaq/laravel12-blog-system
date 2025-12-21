<x-layout>
		<x-slot:title>{{ $title }}</x-slot:title>
				<article class="py-8 max-w-screen-md border-b border-gray-300">
				<h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">
						{{ $post->title }}
					</h2>
				<a wire:navigate href="/about" wire:navigate>{{ $post->author->name }}</a> | 10 November 2025
				<p class="my-4 font-light">
						{{ $post->body }}
				</p>
				<a href="/posts" wire:navigate class="font-medium text-blue-500 hover:underline">&laquo;Back</a>
		</article>
</x-layout>
