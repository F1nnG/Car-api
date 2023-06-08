<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\SearchService;

use App\Models\Car;
use App\Models\Brand;
use App\Enums\CarType;

class CarController extends Controller
{
	private $SearchService;

	public function __construct()
	{
		$this->SearchService = new SearchService();
	}

	public function indexCars(Request $request)
	{
		$query = $this->SearchService->searchCars($request);

		$cars = $query->paginate(10);

		if (isset($request->edit)) {
			$editCar = Car::find($request->edit);
		}

		return view('admin.cars', [
			'cars' => $cars,
			'brands' => Brand::orderBy('name')->get(),
			'carTypes' => CarType::getValues(),
			'editCar' => $editCar ?? null,
		]);
	}

	public function storeCar(Request $request)
	{
		Car::create([
			'brand_id' => $request->brand,
			'model' => $request->model,
			'price' => $request->price,
			'type' => CarType::fromValue($request->type),
			'usage' => $request->usage,
		]);

		return redirect()->route('admin.cars');
	}

	public function updateCar(Request $request, Car $car)
	{
		$car->update([
			'brand_id' => $request->brand,
			'model' => $request->model,
			'price' => $request->price,
			'type' => CarType::fromValue($request->type),
			'usage' => $request->usage,
		]);

		return redirect()->route('admin.cars');
	}

	public function destroyCar(Car $car)
	{
		$car->delete();
		return redirect()->route('admin.cars');
	}
}