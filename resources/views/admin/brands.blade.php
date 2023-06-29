@extends('layouts.admin_dashboard')

@section('content')

	<div class="bg-gray-900 bg-opacity-80 fixed inset-0 z-40" style="display: none;"></div>

	<h1 class="w-full text-center text-8xl font-bold text-gray-800 pt-8">Brands</h1>

	<div class="pt-16 mx-auto max-w-screen-xl px-4 lg:px-12">
		<div class="bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
			<div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
				<div class="w-full md:w-1/2">
					<form class="flex items-center">
						<label for="simple-search" class="sr-only">Search</label>
						<div class="relative w-full">
							<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
								<svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
								</svg>
							</div>
							<form action="{{ route('admin.brands') }}" method="get">
								<input type="text" id="search" name="search" class="border text-sm rounded-lg block w-full pl-10 p-2 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Search" value="{{ request('search') }}">
							</form>
							</div>
					</form>
				</div>
				<div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
					<button type="button" data-modal-toggle="create-brand-modal" class="flex items-center justify-center text-white focus:ring-4 font-medium rounded-lg text-sm px-4 py-2 bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-primary-800">
						<svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
							<path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
						</svg>
						New Brand
					</button>
				</div>
			</div>
			<div class="overflow-x-auto">
				<table class="w-full text-sm text-left text-gray-400">
					<thead class="text-xs uppercase bg-gray-700 text-gray-400">
						<tr>
							<th scope="col" class="px-4 py-3">
								Brand
							</th>
							<th scope="col" class="px-4 py-3">
								Country
							</th>
							<th scope="col" class="px-4 py-3">
								Website
							</th>
							<th scope="col" class="px-4 py-3">
								<span class="sr-only">Actions</span>
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($brands as $brand)
							<tr class="border-b border-gray-700">
								<th scope="row" class="px-4 py-3 font-medium whitespace-nowrap text-white">{{ $brand->name }}</th>
								<td class="px-4 py-3">{{ $brand->country }}</td>
								<td class="px-4 py-3">{{ $brand->website }}</td>
								<td class="px-4 py-3 flex items-center justify-end">
									<button id="action-dropdown-{{ $brand->id }}-button" data-dropdown-toggle="action-dropdown-{{ $brand->id }}" class="inline-flex items-center p-0.5 text-sm font-medium text-center rounded-lg focus:outline-none text-gray-400 hover:text-gray-100" type="button">
										<svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
											<path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
										</svg>
									</button>
									<div id="action-dropdown-{{ $brand->id }}" class="hidden z-10 w-44 rounded divide-y shadow bg-gray-700 divide-gray-600">
										<ul class="py-1 text-sm text-gray-200" aria-labelledby="action-dropdown-{{ $brand->id }}-button">
											<li>
												<a href="{{ route('admin.brands', ['edit' => $brand->id]) }}" class="block py-2 px-4 hover:bg-gray-600 hover:text-white">Edit</a>
											</li>
										</ul>
										<div class="py-1">
											<form action="{{ route('admin.brands.destroy', ['brand' => $brand->id]) }}" method="POST">
												@method('DELETE')
												@csrf

												<input type="submit" value="Delete" class="block py-2 px-4 text-sm hover:bg-gray-600 text-gray-200 hover:text-white w-full text-start cursor-pointer">
											</form>
										</div>
									</div>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			{{ $brands->onEachSide(3)->links('components.admin.pagination', ['type' => 'brands']) }}
		</div>
	</div>

	@if ($editBrand)
		<x-admin.edit-brand-modal :brand="$editBrand" />
	@else
		<x-admin.create-brand-modal/>
	@endif

@endsection