@extends('layouts.user.user')

@section('content')
	<form action="{{ route('cars.search') }}" method="POST" class="w-full">
		<div class="mb-16 flex items-start">
			<!-- Sidebar -->
			<div class="bg-gray-800 border border-gray-700 rounded-lg h-fit w-1/6 p-4 m-4">
				<h1 class="text-white font-semibold text-2xl mb-4">Car Filters</h1>
				<div class="w-full">
					@csrf
					<input type="hidden" name="return" value="{{ url()->current() }}">

					<!-- Brand -->
					<label for="brand" class="block mb-2 text-sm font-medium text-white">Brand</label>
					<select name="brand" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:border-blue-500">
						<option selected value="">all</option>
						@foreach ($brands->sortBy('name') as $brand)
							<option @if (isset($searchRequest['brand']) && $searchRequest['brand'] == $brand->id) selected @endif value="{{ $brand->id }}">{{ $brand->name }}</option>
						@endforeach
					</select>

					<!-- Body -->
					<label for="body" class="block mt-4 mb-2 text-sm font-medium text-white">Body</label>
					<select name="body" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
						<option selected value="">all</option>
						@foreach ($bodies as $key => $body)
							<option @if (isset($searchRequest['body']) && $searchRequest['body'] == $key) selected @endif value="{{ $key }}">{{ $body }}</option>
						@endforeach
					</select>


					<!-- Fuel -->
					<label for="fuel" class="block mt-4 mb-2 text-sm font-medium text-white">Fuel</label>
					<select name="fuel" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
						<option selected value="">all</option>
						@foreach ($fuels as $key => $fuel)
							<option @if (isset($searchRequest['fuel']) && $searchRequest['fuel'] == $key) selected @endif value="{{ $key }}">{{ $fuel }}</option>
						@endforeach
					</select>


					<!-- Construction Year -->
					<label for="construction_year_from" class="block mt-4 mb-2 text-sm font-medium text-white">Construction Year</label>
					<div class="w-full flex justify-between">
						<!-- Construction Year From -->
						<input @if (isset($searchRequest['construction_year_from'])) value="{{ $searchRequest['construction_year_from'] }}" @endif type="number" name="construction_year_from" placeholder="From" class="w-[45%] bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 placeholder-gray-400">

						<!-- Construction Year To -->
						<input @if (isset($searchRequest['construction_year_to'])) value="{{ $searchRequest['construction_year_to'] }}" @endif type="number" name="construction_year_to" placeholder="To" class="w-[45%] bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 placeholder-gray-400">
					</div>

					<!-- Price -->
					<label for="price_from" class="block mt-4 mb-2 text-sm font-medium text-white">Price</label>
					<div class="w-full flex justify-between">
						<!-- Price From -->
						<input @if (isset($searchRequest['price_from'])) value="{{ $searchRequest['price_from'] }}" @endif type="number" name="price_from" placeholder="From" class="w-[45%] bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 placeholder-gray-400">

						<!-- Price To -->
						<input @if (isset($searchRequest['price_to'])) value="{{ $searchRequest['price_to'] }}" @endif type="number" name="price_to" placeholder="To" class="w-[45%] bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 placeholder-gray-400">
					</div>


					<!-- Power -->
					<div class="w-full flex justify-between">
						<!-- Power Type -->
						<div class="w-[30%]">
							<label for="power" class="block mt-4 mb-2 text-sm font-medium text-white">Power</label>
							<select name="power" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
								<option selected value="kw">kW</option>
								<option @if (isset($searchRequest['power']) && $searchRequest['power'] == 'hp') selected @endif value="hp">HP</option>
							</select>
						</div>
					
						<!-- Power From -->
						<div class="w-[30%]">
							<label for="power_from" class="block mt-4 mb-2 text-sm font-medium text-white">From</label>
							<input @if (isset($searchRequest['power_from'])) value="{{ $searchRequest['power_from'] }}" @endif type="number" name="power_from" placeholder="From" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400">
						</div>
					
						<!-- Power To -->
						<div class="w-[30%]">
							<label for="power_to" class="block mt-4 mb-2 text-sm font-medium text-white">To</label>
							<input @if (isset($searchRequest['power_to'])) value="{{ $searchRequest['power_to'] }}" @endif type="number" name="power_to" placeholder="To" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400">
						</div>
					</div>

					<!-- Transmission -->
					<label for="transmission" class="block mt-4 mb-2 text-sm font-medium text-white">Transmission</label>
					<select name="transmission" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
						<option selected value="">all</option>
						@foreach ($transmissions as $key => $transmission)
							<option @if (isset($searchRequest['transmission']) && $searchRequest['transmission'] == $key) selected @endif value="{{ $key }}">{{ $transmission }}</option>
						@endforeach
					</select>

					<!-- Number of Doors -->
					<label for="number_of_doors" class="block mt-4 mb-2 text-sm font-medium text-white">Number of Doors</label>
					<div class="w-full flex">
						@foreach ($doors as $key => $door)
							<div class="w-1/4">
								<input @if (($loop->first) || (isset($searchRequest['doors']) && $searchRequest['doors'] == $door)) checked @endif type="radio" name="doors" id="{{ $door }}" value="{{ $door }}" class="hidden peer">
								<label for="{{ $door }}" class="w-full bg-gray-700 hover:bg-gray-600 peer-checked:bg-blue-500">
									<div class="w-full text-sm h-12 border border-gray-600 @if (!$loop->last) border-r-0 @endif @if ($loop->first) rounded-l-lg @endif @if ($loop->last) rounded-r-lg @endif bg-inherit flex justify-center items-center text-white cursor-pointer transition-all ease-in duration-100">
										<p>{{ $key }}</p>
									</div>
								</label>
							</div>
						@endforeach
					</div>

					<!-- Number of Seats -->
					<label for="seats_from" class="block mt-4 mb-2 text-sm font-medium text-white">Number of Seats</label>
					<div class="w-full flex justify-between">
						<!-- Seats From -->
						<div class="w-[45%]">
							<select name="seats_from" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
								<option selected value="">From</option>
								@for ($i = 1; $i <= 12; $i++)
									<option @if (isset($searchRequest['seats_from']) && $searchRequest['seats_from'] == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
								@endfor
							</select>
						</div>

						<!-- Seats To -->
						<div class="w-[45%]">
							<select name="seats_to" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
								<option selected value="">To</option>
								@for ($i = 1; $i <= 12; $i++)
									<option @if (isset($searchRequest['seats_to']) && $searchRequest['seats_to'] == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
								@endfor
							</select>
						</div>
					</div>

					<!-- Search -->
					<button type="submit" class="w-full mt-4 text-sm font-medium bg-transparent text-white border-2 border-blue-500 rounded transition-all ease-in duration-75 hover:bg-blue-500">
						<p class="px-6 py-2">Search</p>
					</button>
				</div>

				<!-- Clear Filters -->
				@if (url()->current() != route('cars.index'))
					<div class="w-full text-center mt-2">
						<a href="{{ route('cars.index') }}" class="text-center text-sm font-normal text-gray-400 hover:text-gray-300 cursor-pointer">Clear Filters</a>
					</div>
				@endif
			</div>

			<!-- Cars -->
			<div class="w-4/6 content-center grid grid-cols-3 max-md:grid-cols-1">
				<!-- Search -->
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
				<!-- Cars -->
				@forelse ($cars as $car)
					<x-user.cars.car :car="$car" />
				@empty
					<div class="w-full text-center mt-12 col-span-3">
						<p class="ml-16 text-2xl font-medium text-gray-400">No Cars Found</p>
					</div>
				@endforelse
			</div>

			<div class="w-1/6 p-4 m-4">
		</div>
	</form>
@endsection
