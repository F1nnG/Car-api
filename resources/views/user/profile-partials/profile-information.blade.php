<div class="p-6 bg-gray-800 rounded-lg">
	<div class="flex justify-start items-center">
		<!-- Profile Picture -->
		<a href="{{ auth()->user()->profile_picture ? url("storage/auth()->user()->profile_picture") : url('storage/source/dummy_pfp.png') }}">
			<img src="{{ auth()->user()->profile_picture ? url("storage/auth()->user()->profile_picture") : url('storage/source/dummy_pfp.png') }}" alt="Profile Picture" class="w-24 h-24 rounded-full object-cover border-2 border-gray-600">
		</a>
		<!-- Profile Information -->
		<div class="ml-4">
			<!-- Name -->
			<h1 class="flex items-center text-2xl font-bold text-white">
				{{ auth()->user()->name }}
				@if (auth()->user()->is_admin)
					<span class="text-xs font-medium ml-2 mt-1 px-2.5 py-0.5 rounded bg-yellow-900 text-yellow-300">Admin</span>
				@else
					<span class="text-xs font-medium ml-2 mt-1 px-2.5 py-0.5 rounded bg-blue-900 text-blue-300">User</span>
				@endif
			</h1>
			<!-- Email -->
			<h3 class="text-xl font-normal text-gray-300">{{ auth()->user()->email }}</h3>
		</div>
	</div>
</div>