<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\SearchService;
use App\Http\Services\ValidationService;

use App\Models\Car;
use App\Models\Brand;

use App\Enums\CarBody;
use App\Enums\CarFuel;
use App\Enums\CarTransmission;
use App\Enums\CarDoors;

class CarController extends Controller
{
	private $SearchService;
	private $ValidationService;
	public function __construct()
	{
		$this->SearchService = new SearchService();
		$this->ValidationService = new ValidationService();
	}

	public function index(Request $request)
	{
		$query = $this->SearchService->searchCars($request);
		$cars = $query->paginate(12)->appends($request->except('page'));

		return view('user.cars', [
			'cars' => $cars,
			'brands' => Brand::all(),
			'enums' => $this->getEnums(),
			'searchRequest' => $request->input() ?? [],
		]);
	}

	public function show(Car $car)
	{
		return view('user.car', [
			'car' => $car,
			'brands' => Brand::all(),
			'enums' => $this->getEnums(),
		]);
	}

	public function store(Request $request)
	{
		$this->ValidationService->validateCar($request);

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

		$this->saveImage($request->file('car_image'), $car);

		return redirect()->route('cars.index');
	}

	public function update(Request $request, Car $car)
	{
		$this->ValidationService->validateCar($request);

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

		if ($request->hasFile('car_image'))
			$this->saveImage($request->file('car_image'), $car);

		return redirect()->route('cars.show', ['car' => $car->id]);
	}

	public function destroy(Car $car)
	{
		$car->delete();

		return redirect()->route('cars.index');
	}

	private function getEnums(): array
	{
		return [
			'bodies' => CarBody::asSelectArray(),
			'fuels' => CarFuel::asSelectArray(),
			'transmissions' => CarTransmission::asSelectArray(),
			'doors' => CarDoors::asSelectArray(),
		];
	}

	private function saveImage($image, $car): void
	{
		$extension = $image->getClientOriginalExtension();
		$filename = 'car_' . $car->id . '.' . $extension;
		$path = $image->storeAs('car_images', $filename, 'public');

		$car->image = $path;
		$car->save();
	}
}
