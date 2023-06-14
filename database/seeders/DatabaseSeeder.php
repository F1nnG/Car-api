<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\UserRequest;
use App\Models\Brand;
use App\Models\Car;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		UserRequest::factory(100)
			->create();

		User::factory()
			->state([
				'is_admin' => true,
				'name' => 'Admin',
				'email' => 'admin@admin.com',
				'password' => 'admin',
			])
			->create();

		User::factory()
			->state([
				'is_admin' => false,
				'name' => 'User',
				'email' => 'user@user.com',
				'password' => 'user',
			])
			->create();

		Brand::factory(100)
			->has(
				Car::factory(10)
			)->create();
	}
}
