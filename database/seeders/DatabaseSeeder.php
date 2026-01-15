<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Metadata\Test;

class DatabaseSeeder extends Seeder
{
	use WithoutModelEvents;

	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		// User::factory(10)->create();

		User::create([
			'name' => 'admin',
			'email' => 'adm.impostmedia@gmail.com',
			'password' => Hash::make('omsetnaik1_'),
		]);

		$this->call([
			ArticleCategorySeeder::class,
			PortfolioCategorySeeder::class,
			ServiceSeeder::class,
			ArticleSeeder::class,
			TestimonialSeeder::class,
		]);
	}
}
