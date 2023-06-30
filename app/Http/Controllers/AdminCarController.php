<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\SearchService;

use App\Models\Car;
use App\Models\Brand;

// Enums
use App\Enums\CarBody;
use App\Enums\CarFuel;
use App\Enums\CarTransmission;
use App\Enums\CarDoors;

class AdminCarController extends Controller
{
	private $SearchService;

	public function __construct()
	{
		$this->SearchService = new SearchService();
	}

	public function index(Request $request)
	{
		$query = $this->SearchService->searchCars($request);

		$cars = $query->paginate(10);

		if (isset($request->edit)) {
			$editCar = Car::find($request->edit);
		}

		return view('admin.cars', [
			'cars' => $cars,
			'editCar' => $editCar ?? null,
			'brands' => Brand::orderBy('name')->get(),
			'bodies' => CarBody::getValues(),
			'fuels' => CarFuel::getValues(),
			'transmissions' => CarTransmission::getValues(),
			'doors' => CarDoors::getValues(),
		]);
	}

	public function store(Request $request)
	{
		$request->validate([
			'car_image' => ['required', 'image'],
		]);

		$car = Car::create([
			'brand_id' => $request->brand,
			'model' => $request->model,
			'body' => CarBody::fromValue($request->body),
			'fuel' => CarFuel::fromValue($request->fuel),
			'construction_year' => $request->construction_year,
			'price' => $request->price,
			'hp' => $request->horsepower,
			'kw' => $request->torque,
			'transmission' => CarTransmission::fromValue($request->transmission),
			'doors' => CarDoors::fromValue($request->doors),
			'seats' => $request->seats,
			'description' => $request->description,
		]);

		
		$extension = $request->file('car_image')->getClientOriginalExtension();
		$filename = 'car_' . $car->id . '.' . $extension;
		$path = $request->file('car_image')->storeAs('car_images', $filename, 'public');

		$car->image = $path;
		$car->save();

		return redirect()->route('cars.index');
	}

	public function update(Request $request, Car $car)
	{
		$car->update([
			'brand_id' => $request->brand,
			'model' => $request->model,
			'body' => CarBody::fromValue($request->body),
			'fuel' => CarFuel::fromValue($request->fuel),
			'construction_year' => $request->construction_year,
			'price' => $request->price,
			'hp' => $request->horsepower,
			'kw' => $request->torque,
			'transmission' => CarTransmission::fromValue($request->transmission),
			'doors' => CarDoors::fromValue($request->doors),
			'seats' => $request->seats,
			'description' => $request->description,
		]);

		if ($request->hasFile('car_image')) {
			$extension = $request->file('car_image')->getClientOriginalExtension();
			$filename = 'car_' . $car->id . '.' . $extension;
			$path = $request->file('car_image')->storeAs('car_images', $filename, 'public');

			$car->image = $path;
			$car->save();
		}

		return redirect()->route('cars.show', ['car' => $car->id]);
	}

	public function destroy(Car $car)
	{
		$car->delete();
		return redirect()->route('cars.index');
	}
}