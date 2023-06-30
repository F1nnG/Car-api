<!-- Main modal -->
<div id="create-car-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
	<div class="relative p-4 w-full max-w-4xl h-full md:h-auto">
		<!-- Modal content -->
		<div class="relative p-4 rounded-lg shadow bg-gray-800 sm:p-5">
			<!-- Modal header -->
			<div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 border-gray-600">
				<h3 class="text-lg font-semibold text-white">
					Create Car
				</h3>
				<button type="button" class="text-gray-400 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-600 hover:text-white" data-modal-toggle="create-car-modal">
					<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
					<span class="sr-only">Close modal</span>
				</button>
			</div>
			<!-- Modal body -->
			<form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="grid gap-4 mb-4 sm:grid-cols-3">
					<!-- Brand -->
					<div>
						<label for="brand" class="block mb-2 text-sm font-medium text-white">Brand</label>
						<select name="brand" id="brand" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500">
							@foreach ($brands as $brand)
								<option value="{{ $brand->id }}">{{ $brand->name }}</option>
							@endforeach
						</select>
					</div>
					<!-- Model -->
					<div class="sm:col-span-2">
						<label for="name" class="block mb-2 text-sm font-medium text-white">Model</label>
						<input type="text" name="model" id="model" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Type model name" required>
					</div>
					<!-- Body -->
					<div>
						<label for="body" class="block mb-2 text-sm font-medium text-white">Body</label>
						<select name="body" id="body" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500">
							@foreach ($bodies as $body)
								<option value="{{ lcfirst($body) }}">{{ $body }}</option>
							@endforeach
						</select>
					</div>
					<!-- Fuel -->
					<div>
						<label for="fuel" class="block mb-2 text-sm font-medium text-white">Fuel</label>
						<select name="fuel" id="fuel" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500">
							@foreach ($fuels as $fuel)
								<option value="{{ lcfirst($fuel) }}">{{ $fuel }}</option>
							@endforeach
						</select>
					</div>
					<!-- Construction Year -->
					<div>
						<label for="construction_year" class="block mb-2 text-sm font-medium text-white">Construction Year</label>
						<input type="number" name="construction_year" id="construction_year" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Construction Year" required>
					</div>
					<!-- Transmission -->
					<div>
						<label for="transmission" class="block mb-2 text-sm font-medium text-white">Transmission</label>
						<select name="transmission" id="transmission" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500">
							@foreach ($transmissions as $transmission)
								<option value="{{ lcfirst($transmission) }}">{{ $transmission }}</option>
							@endforeach
						</select>
					</div>
					<!-- Horsepower -->
					<div>
						<label for="horsepower" class="block mb-2 text-sm font-medium text-white">Horsepower</label>
						<input type="number" name="horsepower" id="horsepower" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Horsepower" required>
					</div>
					<!-- Torque -->
					<div>
						<label for="torque" class="block mb-2 text-sm font-medium text-white">Torque</label>
						<input type="number" name="torque" id="torque" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Torque" required>
					</div>
					<!-- Price -->
					<div>
						<label for="price" class="block mb-2 text-sm font-medium text-white">Price</label>
						<input type="number" name="price" id="price" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Car price" required>
					</div>
					<!-- Doors -->
					<div>
						<label for="doors" class="block mb-2 text-sm font-medium text-white">Doors</label>
						<select name="doors" id="doors" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500">
							@foreach ($doors as $door => $i)
								@if ($door != 'All') <option value="{{ $door }}">{{ $door }}</option> @endif
							@endforeach
						</select>
					</div>
					<!-- Seats -->
					<div>
						<label for="seats" class="block mb-2 text-sm font-medium text-white">Seats</label>
						<input type="number" name="seats" id="seats" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Seats" required>
					</div>
					<!-- Description -->
					<div class="sm:col-span-3">
						<label for="description" class="block mb-2 text-sm font-medium text-white">Description</label>
						<textarea name="description" id="description" cols="30" rows="5" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Description" required></textarea>
					</div>
					<!-- Image -->
					<div class="sm:col-span-3">
						<label for="car_image" class="block mb-2 text-sm font-medium text-white">Image</label>
						<input name="car_image" id="file_input" type="file" class="cursor-pointer file:cursor-pointer text-gray-400 text-sm rounded-lg w-full bg-gray-700 border border-gray-600 file:py-2.5 file:px-2.5 file:text-white file:border-none file:bg-gray-600 hover:file:bg-gray-500" required>
					</div>
				</div>
				<div class="flex justify-end mt-8">
					<button type="submit" class="text-white inline-flex items-center focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-primary-600 hover:bg-primary-700 focus:ring-primary-800">
						<svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
						Create new car
					</button>
				</div>
			</form>
		</div>
	</div>
</div>