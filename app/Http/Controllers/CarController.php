<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Car;
use App\Models\Brand;
use App\Enums\CarBody;
use App\Enums\CarFuel;
use App\Enums\CarTransmission;
use App\Enums\CarDoors;

class CarController extends Controller
{
	public function index(Request $request)
	{
		$user = Auth::user() ?? null;
		$query = $this->search($request);
		$cars = $query->paginate(12)->appends($request->except('page'));

		return view('user.cars', [
			'user' => $user,
			'cars' => $cars,
			'brands' => Brand::all(),
			'bodies' => CarBody::asSelectArray(),
			'fuels' => CarFuel::asSelectArray(),
			'transmissions' => CarTransmission::asSelectArray(),
			'doors' => array_merge(['All' => 'all'], CarDoors::asSelectArray()),
			'searchRequest' => $request->input() ?? [],
		]);
	}

	public function show(Car $car)
	{
		$user = Auth::user() ?? null;

		return view('user.car', [
			'user' => $user,
			'car' => $car,
			'brands' => Brand::all(),
			'bodies' => CarBody::asSelectArray(),
			'fuels' => CarFuel::asSelectArray(),
			'transmissions' => CarTransmission::asSelectArray(),
			'doors' => CarDoors::asSelectArray(),
		]);
	}

	public function search(Request $request)
	{
		$query = Car::query();

		// Search by brand and model
		if ($request->input('search')) {
			$searchTerm = $request->input('search');

			$terms = explode(' ', $searchTerm);
			$brand = $terms[0];
			$model = isset($terms[1]) ? $terms[1] : '';

			$query->where(function ($query) use ($brand, $model) {
				$query->where('model', 'LIKE', "%$model%")
					->whereHas('brand', function ($query) use ($brand) {
						$query->where('name', 'LIKE', "%$brand%");
					});
			});

			$query->orWhere('model', 'LIKE', "%$searchTerm%");
		}

		// Search by filters
		if ($request->input('brand'))
			$query->where('brand_id', $request->input('brand'));
		if ($request->input('body'))
			$query->where('body', $request->input('body'));
		if ($request->input('fuel'))
			$query->where('fuel', $request->input('fuel'));
		if ($request->input('construction_year_from'))
			$query->where('construction_year', '>=', $request->input('construction_year_from'));
		if ($request->input('construction_year_to'))
			$query->where('construction_year', '<=', $request->input('construction_year_to'));
		if ($request->input('price_from'))
			$query->where('price', '>=', $request->input('price_from') * 100);
		if ($request->input('price_to'))
			$query->where('price', '<=', $request->input('price_to') * 100);
		if ($request->input('power_from'))
			$query->where($request->input('power'), '>=', $request->input('power_from'));
		if ($request->input('power_to'))
			$query->where($request->input('power'), '<=', $request->input('power_to'));
		if ($request->input('transmission'))
			$query->where('transmission', $request->input('transmission'));
		if ($request->input('doors') != 'all' && $request->input('doors') != null)
			$query->where('doors', CarDoors::fromKey($request->input('doors')));
		if ($request->input('seats_from'))
			$query->where('seats', '>=', $request->input('seats_from'));
		if ($request->input('seats_to'))
			$query->where('seats', '<=', $request->input('seats_to'));

		return $query;
	}
}
