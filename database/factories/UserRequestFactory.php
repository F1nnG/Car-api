<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class UserRequestFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'ip' => $this->faker->ipv4,
			'verb' => $this->faker->randomElement(['GET', 'POST', 'PUT', 'DELETE']),
			'path' => $this->faker->url,
			'status' => $this->faker->randomElement([200, 201, 400, 401, 403, 404, 500]),
			'duration' => $this->faker->numberBetween(1, 1000),
		];
	}
}
