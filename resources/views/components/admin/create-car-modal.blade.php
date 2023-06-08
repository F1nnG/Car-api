<!-- Main modal -->
<div id="create-car-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
	<div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
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
			<form action="{{ route('admin.cars.store') }}" method="POST">
				@csrf
				<div class="grid gap-4 mb-4 sm:grid-cols-2">
					<div class="sm:col-span-2">
						<label for="name" class="block mb-2 text-sm font-medium text-white">Model</label>
						<input type="text" name="model" id="model" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Type model name" required>
					</div>
					<div>
						<label for="price" class="block mb-2 text-sm font-medium text-white">Price</label>
						<input type="number" name="price" id="price" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Car price" required>
					</div>
					<div>
						<label for="brand" class="block mb-2 text-sm font-medium text-white">Brand</label>
						<select name="brand" id="brand" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500">
							@foreach ($brands as $brand)
								<option value="{{ $brand->id }}">{{ $brand->name }}</option>
							@endforeach
						</select>
					</div>
					<div>
						<label for="type" class="block mb-2 text-sm font-medium text-white">Type</label>
						<select name="type" id="type" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500">
							@foreach ($carTypes as $carType)
								<option value="{{ $carType }}">{{ $carType }}</option>
							@endforeach
						</select>
					</div>
					<div>
						<label for="usage" class="block mb-2 text-sm font-medium text-white">Usage</label>
						<input type="number" name="usage" id="usage" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Car usage" required>
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