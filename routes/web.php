<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
	return view('welcome');
})->name('home');

Route::get('/admin/cars', [CarController::class, 'indexCars'])
	->name('admin.cars');
Route::post('/admin/cars', [CarController::class, 'storeCar'])
	->name('admin.cars.store');
Route::put('/admin/cars/{car}', [CarController::class, 'updateCar'])
	->name('admin.cars.update');
Route::delete('/admin/cars/{car}', [CarController::class, 'destroyCar'])
	->name('admin.cars.destroy');

Route::get('/admin/brands', [BrandController::class, 'indexBrands'])
	->name('admin.brands');
Route::post('/admin/brands', [BrandController::class, 'storeBrand'])
	->name('admin.brands.store');
Route::put('/admin/brands/{brand}', [BrandController::class, 'updateBrand'])
	->name('admin.brands.update');
Route::delete('/admin/brands/{brand}', [BrandController::class, 'destroyBrand'])
	->name('admin.brands.destroy');

// Route::get('/dashboard', function () {
// 	return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
// 	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
// 	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
// 	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
