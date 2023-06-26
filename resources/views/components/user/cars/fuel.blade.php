@props(['fuel', 'id'])
<div data-popover-target="car-type-{{ $id }}" data-popover-placement="left" class="text-white text-lg select-none cursor-pointer">
	@if ($fuel == 'Hybrid')
		<i class="fa-solid fa-gas-pump"></i>
		<i class="fa-solid fa-charging-station ml-3"></i>
	@elseif ($fuel == 'Electric')
		<i class="fa-solid fa-charging-station"></i>
	@else
		<i class="fa-solid fa-gas-pump"></i>
	@endif
</div>
<div data-popover id="car-type-{{ $id }}" role="tooltip" class="absolute z-10 invisible inline-block w-fit text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
	<div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
		<h3 class="font-semibold text-gray-900 dark:text-white">{{ $fuel }}</h3>
	</div>
</div>