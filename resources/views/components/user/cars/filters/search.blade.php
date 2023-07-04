@props(['searchRequest'])
<div class="flex items-center col-span-3 m-4 mb-0">
	<label for="simple-search" class="sr-only">Search</label>
	<div class="relative w-full">
		<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
			<svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
		</div>
		<input type="text" id="search" name="search" class="border-2 text-sm rounded-lg block w-full pl-10 p-2.5  bg-gray-800 border-gray-600 placeholder-gray-400 text-white focus:border-blue-500" placeholder="Search" @if (isset($searchRequest['search'])) value="{{ $searchRequest['search'] }}" @endif>
	</div>
	<button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-gray-800 rounded-lg border-2 border-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-600 hover:border-blue-500 transition-all ease-in duration-75">
		<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
		<span class="sr-only">Search</span>
	</button>
</div>