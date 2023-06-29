<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AdminCarController;
use App\Http\Controllers\AdminBrandController;
use Illuminate\Http\Request;

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
Route::get('/', [GuestController::class, 'welcome'])->name('home');

Route::get('/cars', [CarController::class, 'index'])
	->name('cars.index');
Route::get('/cars/{car}', [CarController::class, 'show'])
	->name('cars.show');

Route::middleware('auth')->group(function () {
	// Admin Routes
	Route::middleware('admin')->group(function () {
		Route::get('/admin', fn () => redirect()->route('admin.requests'))
			->name('admin');

		Route::get('/admin/requests', [RequestController::class, 'index'])
			->name('admin.requests');

		Route::get('/admin/cars', [AdminCarController::class, 'index'])
			->name('admin.cars');
		Route::post('/admin/cars', [AdminCarController::class, 'store'])
			->name('admin.cars.store');
		Route::put('/admin/cars/{car}', [AdminCarController::class, 'update'])
			->name('admin.cars.update');
		Route::delete('/admin/cars/{car}', [AdminCarController::class, 'destroy'])
			->name('admin.cars.destroy');

		Route::get('/admin/brands', [AdminBrandController::class, 'index'])
			->name('admin.brands');
		Route::post('/admin/brands', [AdminBrandController::class, 'store'])
			->name('admin.brands.store');
		Route::put('/admin/brands/{brand}', [AdminBrandController::class, 'update'])
			->name('admin.brands.update');
		Route::delete('/admin/brands/{brand}', [AdminBrandController::class, 'destroy'])
			->name('admin.brands.destroy');
	});
});

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
