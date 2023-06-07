<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\CarTypeTrait;
use App\Traits\Price;
use App\Traits\Usage;
use App\Models\Brand;

class Car extends Model
{
	use HasFactory, CarTypeTrait, Price, Usage;

	protected $hidden = [
		'id',
		'brand_id',
		'created_at',
		'updated_at',
	];

	protected $appends = [
		'brand'
	];

	public function getBrandAttribute()
	{
		return $this->brand()->first();
	}

	public function brand()
	{
		return $this->belongsTo(Brand::class);
	}
}
