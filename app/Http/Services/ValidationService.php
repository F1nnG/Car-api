<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

use App\Enums\CarBody;
use App\Enums\CarFuel;
use App\Enums\CarTransmission;
use App\Enums\CarDoors;

class ValidationService
{
	public function validateCar(Request $request)
	{
		$request->validate([
			'brand' => ['required', 'exists:brands,id'],
			'model' => ['required', 'string'],
			'body' => ['required', 'string', 'in:' . implode(',', CarBody::getValues())],
			'fuel' => ['required', 'string', 'in:' . implode(',', CarFuel::getValues())],
			'construction_year' => ['required', 'integer', 'min:1900', 'max:' . date('Y')],
			'price' => ['required', 'integer', 'min:0'],
			'horsepower' => ['required', 'integer', 'min:0'],
			'torque' => ['required', 'integer', 'min:0'],
			'transmission' => ['required', 'string', 'in:' . implode(',', CarTransmission::getValues())],
			'doors' => ['required', 'string', 'in:' . implode(',', CarDoors::getValues())],
			'seats' => ['required', 'integer', 'min:1'],
			'description' => ['required', 'string'],
			'car_image' => ['image'],
		]);
	}

	public function validateBrand(Request $request)
	{
		$request->validate([
			'name' => ['required', 'string'],
			'country' => ['required', 'string'],
			'website' => ['required', 'string'],
		]);
	}
}