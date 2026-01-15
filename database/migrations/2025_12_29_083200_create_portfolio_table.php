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
		Schema::create('portfolio', function (Blueprint $table) {
			$table->id();
			$table->string('slug');
			$table->foreignId('category_id')->nullable()->constrained('portfolio_categories')->onDelete('cascade');
			$table->string('title')->unique();
			$table->text('description');
			$table->string('cover_path')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('portfolio');
	}
};
