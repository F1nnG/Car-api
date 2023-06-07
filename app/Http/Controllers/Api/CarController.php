<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Car;

class CarController extends Controller
{
	public function show(Request $request)
	{
		$query = $this->getQuery($request);
		$cars = $query->limit(10)->get();

		return response()->json($cars);
	}

	private function getQuery(Request $request): \Illuminate\Database\Eloquent\Builder
	{
		$query = Car::query();

		if ($request->has('model'))
			$query->where('model', 'LIKE', "%$request->model%");
		if ($request->has('price'))
			$query->where('price', $request->price * 100);
		if ($request->has('type'))
			$query->where('type', $request->type);
		if ($request->has('usage'))
			$query->where('usage', $request->usage * 100);
		if ($request->has('brand'))
			$query->whereHas('brand', fn ($query) => $query->where('name', 'LIKE', "%$request->brand%"));

		return $query;
	}
}
