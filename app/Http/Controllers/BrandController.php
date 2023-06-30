<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\SearchService;
use App\Http\Services\ValidationService;

use App\Models\Brand;

class BrandController extends Controller
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
		$query = $this->SearchService->searchBrands($request);

		$brands = $query->paginate(10);

		if (isset($request->edit))
			$editBrand = Brand::find($request->edit);

		return view('admin.brands', [
			'brands' => $brands,
			'editBrand' => $editBrand ?? null,
		]);
	}

	public function store(Request $request)
	{
		$this->ValidationService->validateBrand($request);

		Brand::create($request->all());

		return redirect()->route('brands.index');
	}

	public function update(Request $request, Brand $brand)
	{
		$this->ValidationService->validateBrand($request);

		$brand->update($request->all());

		return redirect()->route('brands.index');
	}

	public function destroy(Brand $brand)
	{
		$brand->delete();
		return redirect()->route('brands.index');
	}
}