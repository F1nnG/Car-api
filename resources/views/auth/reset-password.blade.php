@extends('layouts.auth.guest')

@section('content')
	<form method="POST" action="{{ route('password.store') }}">
		@csrf

		<!-- Password Reset Token -->
		<input type="hidden" name="token" value="{{ $request->route('token') }}">

		<!-- Email Address -->
		<div>
			<x-auth.input-label for="email" :value="__('Email')" />
			<x-auth.text-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="Email" :value="old('email', $request->email)" required autofocus autocomplete="username">
				<svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
			</x-auth.text-input>
			<x-auth.input-error :messages="$errors->get('email')" class="mt-2" />
		</div>

		<!-- Password -->
		<div class="mt-4">
			<x-auth.input-label for="password" :value="__('Password')" />
			<x-auth.text-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Password" required autocomplete="new-password">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-gray-500 dark:text-gray-400"><path fill-rule="evenodd" d="M15.75 1.5a6.75 6.75 0 00-6.651 7.906c.067.39-.032.717-.221.906l-6.5 6.499a3 3 0 00-.878 2.121v2.818c0 .414.336.75.75.75H6a.75.75 0 00.75-.75v-1.5h1.5A.75.75 0 009 19.5V18h1.5a.75.75 0 00.53-.22l2.658-2.658c.19-.189.517-.288.906-.22A6.75 6.75 0 1015.75 1.5zm0 3a.75.75 0 000 1.5A2.25 2.25 0 0118 8.25a.75.75 0 001.5 0 3.75 3.75 0 00-3.75-3.75z" clip-rule="evenodd" /></svg>
			</x-auth.text-input>
			<x-auth.input-error :messages="$errors->get('password')" class="mt-2" />
		</div>

		<!-- Confirm Password -->
		<div class="mt-4">
			<x-auth.input-label for="password_confirmation" :value="__('Confirm Password')" />

			<x-auth.text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" placeholder="Password Confirmation" required autocomplete="new-password">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-gray-500 dark:text-gray-400"><path fill-rule="evenodd" d="M15.75 1.5a6.75 6.75 0 00-6.651 7.906c.067.39-.032.717-.221.906l-6.5 6.499a3 3 0 00-.878 2.121v2.818c0 .414.336.75.75.75H6a.75.75 0 00.75-.75v-1.5h1.5A.75.75 0 009 19.5V18h1.5a.75.75 0 00.53-.22l2.658-2.658c.19-.189.517-.288.906-.22A6.75 6.75 0 1015.75 1.5zm0 3a.75.75 0 000 1.5A2.25 2.25 0 0118 8.25a.75.75 0 001.5 0 3.75 3.75 0 00-3.75-3.75z" clip-rule="evenodd" /></svg>
			</x-auth.text-input>

			<x-auth.input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
		</div>

		<div class="flex items-center justify-end mt-4">
			<x-auth.primary-button>
				{{ __('Reset Password') }}
			</x-auth.primary-button>
		</div>
	</form>
@endsection
