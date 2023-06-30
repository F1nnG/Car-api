<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Laravel') }}</title>

		<!-- Scripts -->
		@vite(['resources/css/app.css', 'resources/js/app.js'])

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	</head>
	<body>
		<div class="bg-gray-900 bg-opacity-50 fixed inset-0 z-40" style="display: none;"></div>

		<!-- Navbar -->
		<x-user.navbar.navbar />

		<!-- Content -->
		@yield('content')

		<!-- Footer -->
		<x-user.footer.footer />
	</body>
</html>
