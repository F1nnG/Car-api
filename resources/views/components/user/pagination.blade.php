<div class="flex items-center justify-center my-4 col-span-3">
	<nav class="inline-flex rounded-md shadow">
	<a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-2 rounded-l-md bg-gray-800 text-gray-400 hover:text-white hover:bg-gray-600 border border-r-0 border-gray-600">
		&laquo;
	</a>
	@foreach ($elements as $element)
		@if (is_string($element))
			<span class="px-3 py-2 bg-gray-800 text-gray-400 border border-r-0 border-gray-600 cursor-default">{{ $element }}</span>
		@endif

		@if (is_array($element))
			@foreach ($element as $page => $url)
				<a href="{{ $url }}" class="px-3 py-2 border-gray-600 border-r-0 border @if ($paginator->currentPage() == $page) bg-gray-600 cursor-default text-white @else bg-gray-800 text-gray-400 hover:bg-gray-600 hover:text-white @endif">
					{{ $page }}
				</a> 
			@endforeach
		@endif
	@endforeach
	<a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-2 rounded-r-md bg-gray-800 text-gray-400 hover:text-white hover:bg-gray-600 border border-r-0 border-gray-600">
		&raquo;
	</a>
	</nav>
</div>