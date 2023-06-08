<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Car;
use App\Models\Brand;
use App\Enums\CarType;

class AdminController extends Controller
{
	public function index(Request $request)
	{
		$query = $this->search($request);

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

	private function search(Request $request): \Illuminate\Database\Eloquent\Builder
	{
		$query = Car::query();

		if ($request->has('search') && $request->search != '') {
			if (gettype($request->search) == 'string') {
				$query->orWhere('model', 'LIKE', "%$request->search%");
				$query->orWhere('type', $request->search);
				$query->orWhereHas('brand', fn ($query) => $query->where('name', 'LIKE', "%$request->search%"));
			} else {
				$query->orWhere('price', $request->search * 100);
				$query->orWhere('usage', $request->search * 100);
			}
		}

		return $query->orderBy('brand_id')->orderBy('model');
	}

	public function store(Request $request)
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

	public function update(Request $request, Car $car)
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

	public function destroy(Car $car)
	{
		$car->delete();
		return redirect()->route('admin.cars');
	}
}
