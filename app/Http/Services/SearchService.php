<?php

namespace App\Http\Services;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

use App\Models\Car;
use App\Models\Brand;
use App\Models\UserRequest;

use App\Enums\CarDoors;

class SearchService
{
	public function searchCars(Request $request): Builder
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

	public function searchBrands(Request $request): Builder
	{
		$query = Brand::query();

		if ($request->has('search') && $request->search != '') {
			$query->orWhere('name', 'LIKE', "%$request->search%");
			$query->orWhere('country', 'LIKE', "%$request->search%");
			$query->orWhere('website', 'LIKE', "%$request->search%");
		}

		return $query->orderBy('name');
	}

	public function searchRequests(Request $request): Builder
	{
		$query = UserRequest::query();

		if ($request->has('search') && $request->search != '') {
			$query->orWhere('ip', 'LIKE', "%$request->search%");
			$query->orWhere('verb', 'LIKE', "%$request->search%");
			$query->orWhere('path', 'LIKE', "%$request->search%");
			$query->orWhere('status', $request->search);
			$query->orWhere('duration', $request->search);
			$query->orWhere('created_at', 'LIKE', "%$request->search%");
		}

		return $query->orderBy('created_at', 'desc');
	}
}