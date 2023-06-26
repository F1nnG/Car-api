<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait CarBodyTrait
{
	protected function body(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => ucfirst($value),
		);
	}
}