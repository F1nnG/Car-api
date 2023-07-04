@extends('layouts.user.user')

@section('content')
	<form action="{{ route('cars.index') . '?' . http_build_query(request()->except('page')) }}" method="GET" class="w-full">
		<div class="mb-16 flex items-start">
			<!-- Filter Sidebar -->
			<x-user.cars.filters.sidebar :searchRequest="$searchRequest" :brands="$brands" :enums="$enums" />

			<!-- Cars -->
			<div class="w-4/6 content-center grid grid-cols-3 max-md:grid-cols-1">
				<!-- Search -->
				<x-user.cars.filters.search :searchRequest="$searchRequest" />

				<!-- New Car -->
				@if (auth()->user()->is_admin)
					<div class="col-span-3 mx-4 flex justify-center">
						<button type="button" data-modal-toggle="create-car-modal" class="w-full mt-4 text-sm font-medium bg-transparent text-blue-500 border-2 border-blue-500 rounded transition-all ease-in duration-75 hover:bg-blue-500 hover:text-white">
							<p class="px-6 py-2">&plus; New Car</p>
						</button>
					</div>
				@endif

				<!-- Cars -->
				@forelse ($cars as $car)
					<x-user.cars.car :car="$car" />
				@empty
					<div class="w-full text-center mt-12 col-span-3">
						<p class="ml-16 text-2xl font-medium text-gray-400">No Cars Found</p>
					</div>
				@endforelse

				{{ $cars->onEachSide(3)->links('components.user.pagination') }}
			</div>

			<div class="w-1/6 p-4 m-4"></div>
		</div>
	</form>

	<x-admin.create-car-modal :brands="$brands" :bodies="$enums['bodies']" :fuels="$enums['fuels']" :transmissions="$enums['transmissions']" :doors="$enums['doors']" />
@endsection
