<?php

use App\Enums\CarFuel;
use App\Enums\CarBody;
use App\Enums\CarTransmission;
use App\Enums\CarDoors;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Brand;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('cars', function (Blueprint $table) {
			$table->id();
			$table->foreignIdFor(Brand::class);
			$table->string('model');
			$table->enum('body', CarBody::getValues());
			$table->enum('fuel', CarFuel::getValues());
			$table->year('construction_year');
			$table->integer('price');
			$table->integer('hp');
			$table->integer('kw');
			$table->enum('transmission', CarTransmission::getValues());
			$table->enum('doors', CarDoors::getValues());
			$table->integer('seats');
			$table->longText('description');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('cars');
	}
};
