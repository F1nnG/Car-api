@extends('layouts.auth.guest')

@section('content')
	<div class="mb-4 text-sm text-gray-300">
		{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
	</div>

	<!-- Session Status -->
	<x-auth.session-status class="mb-4" :status="session('status')" />

	<form method="POST" action="{{ route('password.email') }}">
		@csrf

		<!-- Email Address -->
		<div>
			<x-auth.input-label for="email" :value="__('Email')" />
			<x-auth.text-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="Email" :value="old('email')" required autofocus>
				<svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
			</x-auth.text-input>
			<x-auth.input-error :messages="$errors->get('email')" class="mt-2" />
		</div>

		<div class="flex items-center justify-end mt-4">
			<x-auth.primary-button>
				{{ __('Email Password Reset Link') }}
			</x-auth.primary-button>
		</div>
	</form>
@endsection
