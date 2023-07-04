<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BrandController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Guest Routes
Route::get('/', [GuestController::class, 'welcome'])
	->name('home');

Route::middleware('auth')->group(function () {
	// User Routes
	Route::get('/profile', [ProfileController::class, 'edit'])
		->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])
		->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])
		->name('profile.destroy');

	Route::get('/cars', [CarController::class, 'index'])
		->name('cars.index');
	Route::get('/cars/{car}', [CarController::class, 'show'])
		->name('cars.show');

	// Admin Routes
	Route::middleware('admin')->group(function () {
		Route::get('/admin', fn () => redirect()->route('requests.index'))
			->name('admin');

		Route::get('/requests', [RequestController::class, 'index'])
			->name('requests.index');

		Route::post('/cars', [CarController::class, 'store'])
			->name('cars.store');
		Route::put('/cars/{car}', [CarController::class, 'update'])
			->name('cars.update');
		Route::delete('/cars/{car}', [CarController::class, 'destroy'])
			->name('cars.destroy');

		Route::get('/brands', [BrandController::class, 'index'])
			->name('brands.index');
		Route::post('/brands', [BrandController::class, 'store'])
			->name('brands.store');
		Route::put('/brands/{brand}', [BrandController::class, 'update'])
			->name('brands.update');
		Route::delete('/brands/{brand}', [BrandController::class, 'destroy'])
			->name('brands.destroy');
	});
});

require __DIR__.'/auth.php';
