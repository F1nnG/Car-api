<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
	public function welcome()
	{
		if (auth()->user())
			return redirect()->route('cars.index');

		return view('welcome');
	}
}
