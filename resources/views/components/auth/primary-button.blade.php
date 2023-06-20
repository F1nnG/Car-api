<button {{ $attributes->merge(['type' => 'submit', 'class' => 'mb-1 ml-4 text-base font-medium bg-transparent text-gray-900 dark:text-white border-2 border-blue-500 rounded transition-all ease-in duration-75 hover:bg-blue-500']) }}>
	<p class="px-6 py-2">{{ $slot }}</p>
</button>
