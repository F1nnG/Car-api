<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
	use HasFactory;

	protected $fillable = [
		'ip',
		'verb',
		'path',
		'status',
		'duration',
	];
}
