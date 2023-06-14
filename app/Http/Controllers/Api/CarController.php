<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Car;
use App\Models\UserRequest;

class CarController extends Controller
{
	public function show(Request $request)
	{
		$query = $this->getQuery($request);
		$cars = $query->limit(10)->get();

		UserRequest::create([
			'ip' => $request->getClientIp(),
			'verb' => $request->method(),
			'path' => $request->path(),
			'status' => 200,
			'duration' => ((microtime(true) - $request->request_start_time) * 1000),
		]);

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
