<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Brand;
use App\Models\Car;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		Brand::factory(10)
			->has(
				Car::factory(10)
			)->create();
	}
}
