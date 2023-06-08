<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
	public function index()
	{
		$requests = DB::table('telescope_entries')
			->where('type', 'request')
			->whereJsonContains('content->middleware', 'api')
			->orderByDesc('created_at')
			->paginate(10);

		$currentTime = Carbon::now();
		foreach ($requests as $request) {
			$request->content = json_decode($request->content);
			$request->statusColor = $this->getStatusColor($request->content->response_status);

			$pastTime = Carbon::parse($request->created_at);
			$diffSeconds = $currentTime->diffInSeconds($pastTime);
			$diffMinutes = $currentTime->diffInMinutes($pastTime);
			$diffHours = $currentTime->diffInHours($pastTime);

			if ($diffSeconds < 60)
				$request->timeAgo = $diffSeconds . 's ago';
			elseif ($diffMinutes < 60)
				$request->timeAgo = $diffMinutes . 'm ago';
			elseif ($diffHours < 24)
				$request->timeAgo = $diffHours . 'h ago';
			else
				$request->timeAgo = $pastTime->format('M j, Y g:i A');
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
}
