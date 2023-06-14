<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Brand;
use App\Models\UserRequest;

class BrandController extends Controller
{
	public function show(Request $request)
	{
		$query = $this->getQuery($request);
		$brands = $query->limit(10)->get();

		UserRequest::create([
			'ip' => $request->getClientIp(),
			'verb' => $request->method(),
			'path' => $request->path(),
			'status' => 200,
			'duration' => ((microtime(true) - $request->request_start_time) * 1000),
		]);

		return response()->json($brands);
	}

	private function getQuery(Request $request): \Illuminate\Database\Eloquent\Builder
	{
		$query = Brand::query();

		if ($request->has('name'))
			$query->where('name', 'LIKE', "%$request->name%");
		if ($request->has('country'))
			$query->where('country', 'LIKE', "%$request->country%");

		return $query;
	}
}
