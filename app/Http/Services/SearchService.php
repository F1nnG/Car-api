<?php

namespace App\Http\Services;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

use App\Models\Car;
use App\Models\Brand;

class SearchService
{
	public function searchCars(Request $request): Builder
	{
		$query = Car::query();

		if ($request->has('search') && $request->search != '') {
			if (!is_numeric($request->search)) {
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
}