<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\CarType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'model' => $this->faker->word(),
			'price' => $this->faker->numberBetween(10000, 100000),
			'type' => CarType::getRandomValue(),
			'usage' => $this->faker->numberBetween(0, 100000),
		];
	}
}
