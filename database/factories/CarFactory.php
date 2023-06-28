<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\CarFuel;
use App\Enums\CarBody;
use App\Enums\CarTransmission;
use App\Enums\CarDoors;

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
			'body' => CarBody::getRandomValue(),
			'fuel' => CarFuel::getRandomValue(),
			'construction_year' => $this->faker->numberBetween(1990, 2020),
			'price' => $this->faker->numberBetween(10000, 100000),
			'hp' => $this->faker->numberBetween(50, 800),
			'kw' => $this->faker->numberBetween(50, 800),
			'transmission' => CarTransmission::getRandomValue(),
			'doors' => CarDoors::getRandomValue(),
			'seats' => $this->faker->numberBetween(1, 12),
			'description' => $this->faker->realText(600),
		];
	}
}
