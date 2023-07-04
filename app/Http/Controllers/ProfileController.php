<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
	/**
	 * Display the user's profile form.
	 */
	public function edit(Request $request): View
	{
		return view('user.profile', [
			'user' => $request->user(),
		]);
	}

	public function update(Request $request): RedirectResponse
	{
		$request->validate([
			'name' => ['required', 'string', 'regex:/^\w+$/', 'max:30', 'unique:users,name'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
		], [
			'name.required' => 'The Name field is required.',
			'name.string' => 'The Name field must be text.',
			'name.regex' => 'The Name field must be a single word.',
			'name.max' => 'The Name field must be less than or equal to 30 characters.',
			'name.unique' => 'This Name is already in use.',
			'email.required' => 'The Email field is required.',
			'email.string' => 'The Email field must be text.',
			'email.email' => 'The Email field must be a valid email address.',
			'email.max' => 'The Email field must be less than 255 characters.',
			'email.unique' => 'This Email is already in use.',
		]);

		$request->user()->fill($request->all());

		$request->user()->save();

		return Redirect::route('profile.edit')->with('status', 'profile-updated');
	}

	/**
	 * Delete the user's account.
	 */
	public function destroy(Request $request): RedirectResponse
	{
		$user = $request->user();

		Auth::logout();

		$user->delete();

		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return Redirect::to('/');
	}
}
