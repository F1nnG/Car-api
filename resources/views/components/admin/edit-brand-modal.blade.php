<!-- Main modal -->
<div id="edit-brand-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
	<div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
		<!-- Modal content -->
		<div class="relative p-4 rounded-lg shadow bg-gray-800 sm:p-5">
			<!-- Modal header -->
			<div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 border-gray-600">
				<h3 class="text-lg font-semibold text-white">
					Edit Brand
				</h3>
				<a href="{{ route('brands.index') }}" class="text-gray-400 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-600 hover:text-white">
					<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
					<span class="sr-only">Close modal</span>
				</a>
			</div>
			<!-- Modal body -->
			<form action="{{ route('brands.update', ['brand' => $brand->id]) }}" method="POST">
				@method('PUT')
				@csrf
				<div class="grid gap-4 mb-4 sm:grid-cols-2">
					<div>
						<label for="name" class="block mb-2 text-sm font-medium text-white">Name</label>
						<input type="text" name="name" id="name" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Brand name" value="{{ $brand->name }}" required>
					</div>
					<div>
						<label for="country" class="block mb-2 text-sm font-medium text-white">Country</label>
						<input type="text" name="country" id="country" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Brand country" value="{{ $brand->country }}" required>
					</div>
					<div class="sm:col-span-2">
						<label for="website" class="block mb-2 text-sm font-medium text-white">Website</label>
						<input type="text" name="website" id="website" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Brand website" value="{{ $brand->website }}" required>
					</div>
				</div>
				<div class="flex justify-end mt-8">
					<button type="submit" class="text-white inline-flex items-center focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-primary-600 hover:bg-primary-700 focus:ring-primary-800">
						<svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
						Save brand
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	document.addEventListener("DOMContentLoaded", function(event) {
		const modal = new Modal(
			document.getElementById('edit-brand-modal'),
			{}
		);

		modal.show();
	});
	
</script>