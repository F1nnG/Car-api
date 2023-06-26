@props(['user'])
<nav class="border-gray-200 bg-gray-900 sticky top-0 left-0 z-50">
	<div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
		<!-- Logo -->
		<x-user.navbar.logo />

		<!-- Navigation Menu -->
		<ul class="flex">
			<x-user.navbar.link href="{{ route('home') }}" text="Home" />
		</ul>

		<!-- User Menu -->
		@if (isset($user))
			<x-user.navbar.user :user="$user" />
		@else
			<x-user.navbar.guest />
		@endif
	</div>
</nav>
