<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Services\SearchService;

class RequestController extends Controller
{
	private $SearchService;

	public function __construct()
	{
		$this->SearchService = new SearchService();
	}

	public function index(Request $request)
	{
		$query = $this->SearchService->searchRequests($request);

		$requests = $query->paginate(10);

		$currentTime = Carbon::now();
		foreach ($requests as $request) {
			$request->statusColor = $this->getStatusColor($request->status);
			$request->timeAgo = $this->getTimeAgo($currentTime, $request->created_at);
		}

		return view('admin.requests', [
			'requests' => $requests,
		]);
	}

	private function getStatusColor($status)
	{
		if ($status >= 200 && $status < 300)
			return 'text-emerald-100';
		elseif ($status >= 300 && $status < 400)
			return 'text-sky-200';
		elseif ($status >= 400 && $status < 500)
			return 'text-amber-100';
		elseif ($status >= 500)
			return 'text-red-100';
		else
			return 'text-gray-400';
	}

	private function getTimeAgo($currentTime, $created_at)
	{
		$pastTime = Carbon::parse($created_at);
		$diffSeconds = $currentTime->diffInSeconds($pastTime);
		$diffMinutes = $currentTime->diffInMinutes($pastTime);
		$diffHours = $currentTime->diffInHours($pastTime);

		if ($diffSeconds < 60)
			return $diffSeconds . 's ago';
		elseif ($diffMinutes < 60)
			return $diffMinutes . 'm ago';
		elseif ($diffHours < 24)
			return $diffHours . 'h ago';
		else
			return $pastTime->format('M j, Y g:i A');
	}
}
