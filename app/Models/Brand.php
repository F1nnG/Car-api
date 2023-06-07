<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Car;

class Brand extends Model
{
	use HasFactory;

	protected $hidden = [
		'id',
		'created_at',
		'updated_at',
	];

	public function cars()
	{
		return $this->hasMany(Car::class);
	}
}
