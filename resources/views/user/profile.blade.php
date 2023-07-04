@extends('layouts.user.user')

@section('content')
	<div class="max-w-7xl mx-auto mt-8 grid grid-cols-2 gap-8">
		<!-- Profile Information -->
		<div>
			@include('user.profile-partials.profile-information')
		</div>

		<!-- Actions Panel -->
		<div>
			<!-- Update Profile Information -->
			@include('user.profile-partials.update-profile-information-form')

			<!-- Update Password -->
			@include('user.profile-partials.update-password-form')

			<!-- Delete Account -->
			@include('user.profile-partials.delete-user-form')
		</div>
	</div>
@endsection