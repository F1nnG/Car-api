<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait CarFuelTrait
{
	protected function fuel(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => ucfirst($value),
		);
	}
}