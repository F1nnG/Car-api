<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\CarFuelTrait;
use App\Traits\CarBodyTrait;
use App\Traits\CarTransmissionTrait;
use App\Traits\Price;
use App\Traits\Usage;
use App\Models\Brand;

class Car extends Model
{
	use HasFactory, CarFuelTrait, CarBodyTrait, CarTransmissionTrait, Price, Usage;

	protected $fillable = [
		'brand_id',
		'model',
		'price',
		'construction_year',
		'fuel',
		'body',
		'transmission',
		'doors',
		'seats',
	];

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
