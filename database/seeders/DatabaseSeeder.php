<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Brand;
use App\Models\Car;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		User::factory()
			->state([
				'name' => 'Admin',
				'email' => 'admin@admin.com',
				'password' => 'admin',
			])
			->create();

		Brand::factory(10)
			->has(
				Car::factory(10)
			)->create();
	}
}
