<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	{{-- Scripts --}}
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
	<body>
		<div class="min-h-screen bg-white">
			{{-- Navbar --}}
			@if (auth()->user())
				<x-user.navbar.navbar :user="auth()->user()" />
			@else
				<x-user.navbar.navbar />
			@endif

			{{-- Page Content --}}
			<main class="w-full">
				@yield('content')
			</main>
		</div>
	</body>
</html>