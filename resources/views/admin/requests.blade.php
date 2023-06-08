@extends('layouts.admin_dashboard')

@section('content')

	<div class="bg-gray-900 bg-opacity-80 fixed inset-0 z-40 text-emerald-100 text-sky-200 text-amber-100 text-red-100" style="display: none;"></div>

	<h1 class="w-full text-center text-8xl font-bold text-gray-800 pt-14">Api Requests</h1>

	<div class="pt-16 mx-auto max-w-screen-xl px-4 lg:px-12">
		<div class="bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
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
								<th scope="row" class="px-4 py-3 font-medium whitespace-nowrap text-white">{{ $request->content->ip_address }}</th>
								<td class="px-4 py-3">{{ $request->content->method }}</td>
								<td class="px-4 py-3">{{ $request->content->uri }}</td>
								<td class="px-4 py-3 font-bold {{ $request->statusColor }}">{{ $request->content->response_status }}</td>
								<td class="px-4 py-3">{{ $request->content->duration }}ms</td>
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