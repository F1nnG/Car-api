<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use \Illuminate\Http\Exceptions\ThrottleRequestsException;
use Throwable;

use App\Models\UserRequest;

class Handler extends ExceptionHandler
{
	/**
	 * The list of the inputs that are never flashed to the session on validation exceptions.
	 *
	 * @var array<int, string>
	 */
	protected $dontFlash = [
		'current_password',
		'password',
		'password_confirmation',
	];

	/**
	 * Register the exception handling callbacks for the application.
	 */
	public function register(): void
	{
		$this->reportable(function (Throwable $e) {
			//
		});
	}

	public function render($request, Throwable $exception)
	{
		if ($exception instanceof ThrottleRequestsException) {
			UserRequest::create([
				'ip' => $request->getClientIp(),
				'verb' => $request->getMethod(),
				'path' => $request->getPathInfo(),
				'status' => 429,
				'duration' => 0,
			]);

			return response()->json([
				'message' => 'Too many requests. Please try again later.',
			], 429);
		}

		return parent::render($request, $exception);
	}
}
