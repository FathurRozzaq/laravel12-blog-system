<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>{{ $title }}</title>
		@vite(['resources/css/app.css', 'resources/js/app.js'])
		@livewireStyles
</head>

<body class="h-full">

		<div class="min-h-full">
				<x-nav.navbar></x-nav.navbar>
				<x-header>{{ $title }}</x-header>
						
				<main>
					<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
						{{ $slot }}
		            </div>
				</main>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
		<script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
        @livewireScripts
</body>
</html>