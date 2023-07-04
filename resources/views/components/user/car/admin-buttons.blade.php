@props(['carId'])
@if (auth()->user()->is_admin)
	<div class="flex text-2xl select-none mt-1">
		<!-- Edit Car -->
		<button data-modal-toggle="edit-car-modal" type="button">
			<i class="fa-solid fa-pen-to-square ml-8 hover:text-blue-500 cursor-pointer"></i>
		</button>
		<!-- Delete Car -->
		<form action="{{ route('cars.destroy', ['car' => $carId]) }}" method="POST">
			@csrf
			@method('DELETE')
			<button type="submit">
				<i class="fa-solid fa-trash ml-4 hover:text-red-500 cursor-pointer"></i>
			</button>
		</form>
	</div>
@endif