<div class="p-4 bg-gray-800 rounded-lg">
	<h1 class="text-white text-lg font-semibold">Profile Information</h1>
	<p class="mt-1 text-gray-200 text-sm">Update your account's profile information and email address.</p>
	<form method="POST" action="{{ route('profile.update') }}" class="mt-4">
		@csrf
		@method('patch')

		<!-- Name -->
		<div>
			<label class="block mb-2 text-sm font-medium text-white" for="name">Name</label>
			<input type="text" id="name" name="name" placeholder="Name (max 30)" value="{{ old('name', $user->name) }}" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" autocomplete="name">
			@if ($errors->default->get('name'))
				<ul class="text-sm text-red-600 space-y-1">
					@foreach ((array) $errors->default->get('name') as $message)
						<li>{{ $message }}</li>
					@endforeach
				</ul>
			@endif
		</div>

		<!-- Email -->
		<div class="mt-4">
			<label class="block mb-2 text-sm font-medium text-white" for="email">Email</label>
			<input type="email" id="email" name="email" placeholder="Email" value="{{ old('email', $user->email) }}" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" autocomplete="username">
			@if ($errors->default->get('email'))
				<ul class="text-sm text-red-600 space-y-1">
					@foreach ((array) $errors->default->get('email') as $message)
						<li>{{ $message }}</li>
					@endforeach
				</ul>
			@endif
		</div>

		<!-- Save -->
		<button type="submit" class="w-full mt-4 mb-2 py-2 border-2 border-blue-500 rounded-lg text-white text-base font-semibold hover:bg-blue-500 transistion-all ease-in duration-75">Save</button>
		@if (session('status') === 'profile-updated')
			<p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)" class="text-sm text-gray-200 text-center w-full">{{ __('Profile Saved!') }}</p>
		@endif
	</form>
</div>