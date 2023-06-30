<nav class="flex flex-col md:flex-row justify-center items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
	<ul class="inline-flex items-stretch -space-x-px">
		<li>
			<a href="{{ (!$paginator->onFirstPage()) ? route($type . '.index', ['page' => $paginator->currentPage() - 1, 'search' => request('search')]) : '' }}" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 rounded-l-lg border bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white">
				<span class="sr-only">Previous</span>
				<svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
				</svg>
			</a>
		</li>
		@foreach ($elements as $element)
			@if (is_string($element))
				<li class="disabled"><span>{{ $element }}</span></li>
			@endif

			@if (is_array($element))
				@foreach ($element as $page => $url)
					@if ($page == $paginator->currentPage())
						<li>
							<a aria-current="page" class="flex items-center justify-center text-sm z-10 py-2 px-3 leading-tight border hover:bg-primary-100 hover:text-primary-700 border-gray-700 bg-gray-700 text-white">{{ $page }}</a>
						</li>
					@else
						<li>
							<a href="{{ route($type . '.index', ['page' => $page, 'search' => request('search')]) }}" class="flex items-center justify-center text-sm py-2 px-3 leading-tight border bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white">{{ $page }}</a>
						</li>
					@endif
				@endforeach
			@endif
		@endforeach
		<li>
			<a href="{{ ($paginator->hasMorePages()) ? route($type . '.index', ['page' => $paginator->currentPage() + 1, 'search' => request('search')]) : '' }}" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight rounded-r-lg border bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white">
				<span class="sr-only">Next</span>
				<svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
				</svg>
			</a>
		</li>
	</ul>
</nav>