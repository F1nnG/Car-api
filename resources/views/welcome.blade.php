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
<body class="bg-gray-900 select-none">
	<main class="grid grid-cols-2">
		<div class="flex flex-col justify-center h-screen pl-16">
			<h1 class="text-white text-7xl font-bold">Car API</h1>
			<p class="mt-4 text-gray-400 text-lg font-normal">
				Welcome to Car API, your ultimate destination for car enthusiasts and buyers! Whether you're looking to compare different car models, access comprehensive vehicle data, or make informed purchasing decisions, we've got you covered. With our powerful Car API and intuitive car comparison tools, you can effortlessly explore a wide range of automobiles, from sedans to SUVs, sports cars to electric vehicles<br><br>

				To get access to our platform, we invite you to join our community by <a href="{{ route('login') }}" class="text-blue-500 font-medium hover:text-blue-400">logging in</a> or <a href="{{ route('register') }}" class="text-blue-500 font-medium hover:text-blue-400">registering</a>. By creating an account, you'll gain access to all exclusive features, such as saving your favorite cars, personalized recommendations, and the ability to connect with fellow car enthusiasts. Our goal is to empower you with the information you need to make confident choices and enhance your car shopping experience.<br><br>
				
				So why wait? Take the first step towards finding your dream car and sign up today! Whether you're a casual browser, an avid researcher, or a serious buyer, Car API is here to assist you every step of the way. Start exploring now and let us help you navigate the exciting world of automobiles.<br>
			</p>
		</div>

		<div class="flex items-center justify-center">
			<img src="{{ url('storage/source/porsche.png') }}" alt="porsche_image" class="mb-16 w-4/5">
		</div>
	</main>

	<!-- Login / Register Button -->
	<div class="fixed top-8 right-16">
		<a href="{{ route('register') }}" class="text-sm text-gray-300 hover:text-gray-400">Register</a>
		<a href="{{ route('login') }}">
			<button type="submit" class="mb-1 ml-4 text-sm font-medium bg-transparent text-gray-900 dark:text-white border-2 border-blue-500 rounded transition-all ease-in duration-75 hover:bg-blue-500">
				<p class="px-6 py-2">Log in</p>
			</button>
		</a>
	</div>
</body>
</html>
