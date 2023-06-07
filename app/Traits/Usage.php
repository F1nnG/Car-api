<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait Usage
{
	protected function usage(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => $value / 100,
			set: fn ($value) => $value * 100,
		);
	}
}