<div class="mt-8 p-4 bg-gray-800 rounded-lg">
	<h1 class="text-white text-lg font-semibold">Update Password</h1>
	<p class="mt-1 text-gray-200 text-sm">Ensure your account is using a long, random password to stay secure.</p>
	<form method="POST" action="{{ route('password.update') }}" class="mt-4">
		@csrf
		@method('put')

		<!-- Current Password -->
		<div>
			<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="current_password">Current Password</label>
			<input type="password" id="current_password" name="current_password" placeholder="Current Password" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" autocomplete="current-password">
			@if ($errors->updatePassword->get('current_password'))
				<ul class="text-sm text-red-600 space-y-1">
					@foreach ((array) $errors->updatePassword->get('current_password') as $message)
						<li>{{ $message }}</li>
					@endforeach
				</ul>
			@endif
		</div>

		<!-- New Password -->
		<div class="mt-4">
			<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="password">New Password</label>
			<input type="password" id="password" name="password" placeholder="New Password" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" autocomplete="new-password">
			@if ($errors->updatePassword->get('password'))
				<ul class="text-sm text-red-600 space-y-1">
					@foreach ((array) $errors->updatePassword->get('password') as $message)
						<li>{{ $message }}</li>
					@endforeach
				</ul>
			@endif
		</div>

		<!-- New Confirmation -->
		<div class="mt-4">
			<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="password_confirmation">Confirm Password</label>
			<input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" autocomplete="new-password">
			@if ($errors->updatePassword->get('password_confirmation'))
				<ul class="text-sm text-red-600 space-y-1">
					@foreach ((array) $errors->updatePassword->get('password_confirmation') as $message)
						<li>{{ $message }}</li>
					@endforeach
				</ul>
			@endif
		</div>

		<!-- Save -->
		<button type="submit" class="w-full mt-4 mb-2 py-2 border-2 border-blue-500 rounded-lg text-white text-base font-semibold hover:bg-blue-500 transistion-all ease-in duration-75">Save</button>
		@if (session('status') === 'password-updated')
			<p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)" class="text-sm text-gray-200 text-center w-full">{{ __('Password Saved!') }}</p>
		@endif
	</form>
</div>