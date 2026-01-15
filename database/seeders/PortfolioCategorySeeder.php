<?php

namespace Database\Seeders;

use App\Models\PortfolioCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioCategorySeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		PortfolioCategory::factory()->count(10)->create();
	}
}
