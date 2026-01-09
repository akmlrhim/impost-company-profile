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
		Schema::create('job_postings', function (Blueprint $table) {
			$table->id();
			$table->string('title', 160);
			$table->string('slug', 160)->unique();
			$table->text('description');
			$table->string('requirements', 255);
			$table->string('responsibilities', 255);
			$table->string('type', 100);
			$table->string('status', 50);
			$table->date('closing_date');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('job_postings');
	}
};
