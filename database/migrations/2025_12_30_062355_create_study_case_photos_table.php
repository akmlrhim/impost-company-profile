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
		Schema::create('study_case_photos', function (Blueprint $table) {
			$table->id();
			$table->foreignId('study_case_id')->constrained('study_cases')->onUpdate('cascade')->onDelete('cascade');
			$table->string('photo_path');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('study_case_photos');
	}
};
