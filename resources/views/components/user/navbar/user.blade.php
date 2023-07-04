@props(['user'])
<!-- User Menu -->
<button type="button" class="w-32 flex justify-end mr-3 text-sm rounded-full md:mr-0" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
	<span class="sr-only">Open user menu</span>
	<img class="w-10 h-10 rounded-full object-cover" src="{{ auth()->user()->profile_picture ? url("storage/auth()->user()->profile_picture") : url('storage/source/dummy_pfp.png') }}" alt="profile picture">
</button>
<!-- Dropdown menu -->
<div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
	<div class="px-4 py-3">
		<span class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
		<span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
	</div>
	<ul class="py-2" aria-labelledby="user-menu-button">
		<li>
			<a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm cursor-pointer hover:bg-gray-600 text-white dark:text-gray-200">Profile</a>
		</li>
		<li>
			<a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm cursor-pointer hover:bg-gray-600 text-white dark:text-gray-200">Log out</a>
		</li>
	</ul>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
	@csrf
</form>