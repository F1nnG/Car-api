<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('user_requests', function (Blueprint $table) {
			$table->id();
			$table->ipAddress('ip');
			$table->string('verb');
			$table->string('path');
			$table->integer('status');
			$table->integer('duration');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('requests');
	}
};
