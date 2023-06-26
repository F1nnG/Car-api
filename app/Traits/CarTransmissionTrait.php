<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait CarTransmissionTrait
{
	protected function transmission(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => ucfirst($value),
		);
	}
}