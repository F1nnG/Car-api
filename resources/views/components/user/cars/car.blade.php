@props(['car'])
<div class="my-4 mx-4 border rounded-lg shadow bg-gray-800 border-gray-700">
	<a href="{{ url('storage/source/dummy_image.png') }}">
		<img class="rounded-t-lg w-full aspect-video object-cover" src="{{ url('storage/source/dummy_image.png') }}" alt="" />
	</a>
	<div class="p-5">
		<div class="flex items-center justify-between">
			<a href="#" class="mb-2 text-2xl font-bold tracking-tight text-white">
				{{ $car->brand->name }} {{ $car->model }}
			</a>
			<x-user.cars.fuel :fuel="$car->fuel" :id="$car->id" />
		</div>
		<p class="mb-3 text-gray-300 font-normal text-base">{{ $car->construction_year }}, {{ $car->body }}</p>
		<a href="#">
			<button class="mb-1 text-sm font-medium bg-transparent text-white border-2 border-blue-500 rounded transition-all ease-in duration-75 hover:bg-blue-500">
				<p class="px-6 py-2 inline-flex items-center">
					Read more
					<svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
				</p>
			</button>
		</a>
	</div>
</div>