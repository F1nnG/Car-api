<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\SearchService;

use App\Models\Brand;

class BrandController extends Controller
{
	private $SearchService;

	public function __construct()
	{
		$this->SearchService = new SearchService();
	}

	public function indexBrands(Request $request)
	{
		$query = $this->SearchService->searchBrands($request);

		$brands = $query->paginate(10);

		if (isset($request->edit)) {
			$editBrand = Brand::find($request->edit);
		}

		return view('admin.brands', [
			'brands' => $brands,
			'editBrand' => $editBrand ?? null,
		]);
	}

	public function storeBrand(Request $request)
	{
		Brand::create([
			'name' => $request->name,
			'country' => $request->country,
			'website' => $request->website,
		]);

		return redirect()->route('admin.brands');
	}

	public function updateBrand(Request $request, Brand $brand)
	{
		$brand->update([
			'name' => $request->name,
			'country' => $request->country,
			'website' => $request->website,
		]);

		return redirect()->route('admin.brands');
	}

	public function destroyBrand(Brand $brand)
	{
		$brand->delete();
		return redirect()->route('admin.brands');
	}
}