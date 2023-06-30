@props(['user'])
<nav class="border-gray-200 bg-gray-900 sticky top-0 left-0 z-50">
	<div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
		<!-- Logo -->
		<x-user.navbar.logo />

		<!-- Navigation Menu -->
		<ul class="flex items-center">
			<x-user.navbar.link href="{{ route('home') }}" text="Home" />
			<x-user.navbar.link href="{{ route('cars.index') }}" text="Cars" allowed="{{ auth()->user() }}" />
			@if (auth()->user()->is_admin) <hr class=" mx-4 bg-gray-700 h-8 w-0.5 border-0"> @endif
			<x-user.navbar.link href="{{ route('requests.index') }}" text="Requests" allowed="{{ auth()->user()->is_admin }}" />
			<x-user.navbar.link href="{{ route('brands.index') }}" text="Brands" allowed="{{ auth()->user()->is_admin }}" />
		</ul>

		<!-- User Menu -->
		@if (auth()->user())
			<x-user.navbar.user />
		@else
			<x-user.navbar.guest />
		@endif
	</div>
</nav>
