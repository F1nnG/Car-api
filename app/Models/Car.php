<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\CarTypeTrait;
use App\Traits\Price;
use App\Traits\Usage;
use App\Enums\CarType;
use App\Models\Brand;

class Car extends Model
{
	use HasFactory, CarTypeTrait, Price, Usage;

	protected $casts = [
		'type' => CarType::class,
	];

	public function brand()
	{
		return $this->belongsTo(Brand::class);
	}
}
