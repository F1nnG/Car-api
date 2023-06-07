<?php

use App\Enums\CarType;
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
			$table->integer('price');
			$table->enum('type', CarType::getValues());
			$table->integer('usage');
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
