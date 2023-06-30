<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\SearchService;

use App\Models\UserRequest;

class CarController extends Controller
{
	private $SearchService;
	public function __construct()
	{
		$this->SearchService = new SearchService();
	}

	public function show(Request $request)
	{
		$query = $this->SearchService->searchCars($request);
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
}
