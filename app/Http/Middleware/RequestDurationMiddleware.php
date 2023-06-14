<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RequestDurationMiddleware
{
	public function handle(Request $request, Closure $next)
	{
		$request->request_start_time = microtime(true);
		
		return $next($request);
	}
}
