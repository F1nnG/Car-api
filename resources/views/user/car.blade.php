@extends('layouts.user.user')

@section('content')
	<div class="flex justify-center">
		<div class="content-center grid grid-cols-3 max-w-screen-xl w-full mt-4 rounded-lg bg-gray-800">
			<h1 class="text-white text-4xl font-semibold col-span-3 p-8 pb-4">{{$car->brand->name}} {{ $car->model }}</h1>

			<div class="col-span-2 p-8 pt-0">
				<img src="{{ url('storage/source/dummy_image.png') }}" alt="car_picture" class="rounded-md w-full aspect-[16/9]">
				<p class="mt-4 text-base text-gray-400">{{ $car->description }}</p>
			</div>

			<div class="col-span-1 p-8 pt-0">
				<x-user.car.info title="Body" :value="$car->body" />
				<x-user.car.info title="Fuel" :value="$car->fuel" />
				<x-user.car.info title="Construction Year" :value="$car->construction_year" />
				<x-user.car.info title="Price" value="${{ $car->price }}" />
				<x-user.car.info title="Horsepower" :value="$car->hp" />
				<x-user.car.info title="Torque" :value="$car->kw" />
				<x-user.car.info title="Transmission" :value="$car->transmission" />
				<x-user.car.info title="Doors" :value="$car->doors" />
				<x-user.car.info title="Seats" :value="$car->seats" />
			</div>
		</div>
	</div>
@endsection