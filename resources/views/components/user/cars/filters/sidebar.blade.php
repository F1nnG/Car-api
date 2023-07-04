<!-- Sidebar -->
<div class="bg-gray-800 border border-gray-700 rounded-lg h-fit w-1/6 p-4 m-4">
	<h1 class="text-white font-semibold text-2xl mb-4">Car Filters</h1>
	<div class="w-full">
		@csrf
		<input type="hidden" name="return" value="{{ url()->current() }}">

		<!-- Brand -->
		<x-user.cars.filters.label for="brand" label="Brand" />
		<select name="brand" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:border-blue-500">
			<option selected value="">all</option>
			@foreach ($brands->sortBy('name') as $brand)
				<option @if (isset($searchRequest['brand']) && $searchRequest['brand'] == $brand->id) selected @endif value="{{ $brand->id }}">{{ $brand->name }}</option>
			@endforeach
		</select>

		<!-- Body -->
		<x-user.cars.filters.label for="body" label="Body" />
		<select name="body" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
			<option selected value="">all</option>
			@foreach ($enums['bodies'] as $key => $body)
				<option @if (isset($searchRequest['body']) && $searchRequest['body'] == $key) selected @endif value="{{ $key }}">{{ $body }}</option>
			@endforeach
		</select>


		<!-- Fuel -->
		<x-user.cars.filters.label for="fuel" label="Fuel" />
		<select name="fuel" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
			<option selected value="">all</option>
			@foreach ($enums['fuels'] as $key => $fuel)
				<option @if (isset($searchRequest['fuel']) && $searchRequest['fuel'] == $key) selected @endif value="{{ $key }}">{{ $fuel }}</option>
			@endforeach
		</select>


		<!-- Construction Year -->
		<x-user.cars.filters.label for="construction_year_from" label="Construction Year" />
		<div class="w-full flex justify-between">
			<!-- Construction Year From -->
			<x-user.cars.filters.input name="construction_year_from" type="number" placeholder="From" width="w-[45%]" :searchRequest="$searchRequest" />

			<!-- Construction Year To -->
			<x-user.cars.filters.input name="construction_year_to" type="number" placeholder="To" width="w-[45%]" :searchRequest="$searchRequest" />
		</div>

		<!-- Price -->
		<x-user.cars.filters.label for="price_from" label="Price" />
		<div class="w-full flex justify-between">
			<!-- Price From -->
			<x-user.cars.filters.input name="price_from" type="number" placeholder="From" width="w-[45%]" :searchRequest="$searchRequest" />

			<!-- Price To -->
			<x-user.cars.filters.input name="price_to" type="number" placeholder="To" width="w-[45%]" :searchRequest="$searchRequest" />
		</div>


		<!-- Power -->
		<div class="w-full flex justify-between">
			<!-- Power Type -->
			<div class="w-[30%]">
				<x-user.cars.filters.label for="power" label="Power" />
				<select name="power" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
					<option selected value="kw">kW</option>
					<option @if (isset($searchRequest['power']) && $searchRequest['power'] == 'hp') selected @endif value="hp">HP</option>
				</select>
			</div>
		
			<!-- Power From -->
			<div class="w-[30%]">
				<x-user.cars.filters.label for="power_from" label="From" />
				<x-user.cars.filters.input name="power_from" type="number" placeholder="From" width="w-full" :searchRequest="$searchRequest" />
			</div>
		
			<!-- Power To -->
			<div class="w-[30%]">
				<x-user.cars.filters.label for="power_to" label="To" />
				<x-user.cars.filters.input name="power_to" type="number" placeholder="To" width="w-full" :searchRequest="$searchRequest" />
			</div>
		</div>

		<!-- Transmission -->
		<x-user.cars.filters.label for="transmission" label="Transmission" />
		<select name="transmission" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
			<option selected value="">all</option>
			@foreach ($enums['transmissions'] as $key => $transmission)
				<option @if (isset($searchRequest['transmission']) && $searchRequest['transmission'] == $key) selected @endif value="{{ $key }}">{{ $transmission }}</option>
			@endforeach
		</select>

		<!-- Number of Doors -->
		<x-user.cars.filters.label for="number_of_doors" label="Number of Doors" />
		<div class="w-full flex">
			<div class="w-1/4">
				<input checked type="radio" name="doors" id="all" value="all" class="hidden peer">
				<label for="all" class="w-full bg-gray-700 hover:bg-gray-600 peer-checked:bg-blue-500">
					<div class="w-full text-sm h-12 border border-gray-600 border-r-0 rounded-l-lg bg-inherit flex justify-center items-center text-white cursor-pointer transition-all ease-in duration-100">
						<p>All</p>
					</div>
				</label>
			</div>
			@foreach ($enums['doors'] as $key => $door)
				<div class="w-1/4">
					<input @if (isset($searchRequest['doors']) && $searchRequest['doors'] == $door) checked @endif type="radio" name="doors" id="{{ $door }}" value="{{ $door }}" class="hidden peer">
					<label for="{{ $door }}" class="w-full bg-gray-700 hover:bg-gray-600 peer-checked:bg-blue-500">
						<div class="w-full text-sm h-12 border border-gray-600 @if ($loop->last) rounded-r-lg @endif bg-inherit flex justify-center items-center text-white cursor-pointer transition-all ease-in duration-100">
							<p>{{ $key }}</p>
						</div>
					</label>
				</div>
			@endforeach
		</div>

		<!-- Number of Seats -->
		<x-user.cars.filters.label for="seats_from" label="Number of Seats" />
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
	<div class="w-full text-center mt-2">
		<a href="{{ route('cars.index') }}" class="text-center text-sm font-normal text-gray-400 hover:text-gray-300 cursor-pointer">Clear Filters</a>
	</div>
</div>