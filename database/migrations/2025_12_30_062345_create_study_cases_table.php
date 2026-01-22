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
		Schema::create('study_cases', function (Blueprint $table) {
			$table->id();
			$table->string('name', 140)->unique();
			$table->string('slug');
			$table->text('situation');
			$table->text('solution');
			$table->text('result');
			$table->string('category');
			$table->string('cover_path')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('study_cases');
	}
};
