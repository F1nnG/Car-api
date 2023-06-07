<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait CarTypeTrait
{
	protected function type(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => ucfirst($value),
		);
	}
}