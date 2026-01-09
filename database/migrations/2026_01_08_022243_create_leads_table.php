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
		Schema::create('leads', function (Blueprint $table) {
			$table->id();
			$table->string('fullname', 160);
			$table->string('email', 160)->nullable();
			$table->string('phone', 15);
			$table->string('business_name', 160);
			$table->string('income', 160);
			$table->text('note')->nullable();
			$table->string('objective', 160);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('leads');
	}
};
