@extends('layouts.admin_dashboard')

@section('content')

	<div class="bg-gray-900 bg-opacity-80 fixed inset-0 z-40 text-emerald-100 text-sky-200 text-amber-100 text-red-100" style="display: none;"></div>

	<h1 class="w-full text-center text-8xl font-bold text-gray-800 pt-14">Api Requests</h1>

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
							<form action="{{ route('admin.requests') }}" method="get">
								<input type="text" id="search" name="search" class="border text-sm rounded-lg block w-full pl-10 p-2 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Search" value="{{ request('search') }}">
							</form>
							</div>
					</form>
				</div>
			</div>
			<div class="overflow-x-auto">
				<table class="w-full text-sm text-left text-gray-400">
					<thead class="text-xs uppercase bg-gray-700 text-gray-400">
						<tr>
							<th scope="col" class="px-4 py-3">
								IP
							</th>
							<th scope="col" class="px-4 py-3">
								Verb
							</th>
							<th scope="col" class="px-4 py-3">
								Path
							</th>
							<th scope="col" class="px-4 py-3">
								Status
							</th>
							<th scope="col" class="px-4 py-3">
								Duration
							</th>
							<th scope="col" class="px-4 py-3">
								Happened
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($requests as $request)
							<tr class="border-b border-gray-700">
								<th scope="row" class="px-4 py-3 font-medium whitespace-nowrap text-white">{{ $request->ip }}</th>
								<td class="px-4 py-3">{{ $request->verb }}</td>
								<td class="px-4 py-3">{{ $request->path }}</td>
								<td class="px-4 py-3 font-bold {{ $request->statusColor }}">{{ $request->status }}</td>
								<td class="px-4 py-3">{{ $request->duration }}ms</td>
								<td class="px-4 py-3">{{ $request->timeAgo }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			{{ $requests->onEachSide(3)->links('components.admin.pagination', ['type' => 'requests']) }}
		</div>
	</div>

@endsection