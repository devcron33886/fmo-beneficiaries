<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VslaSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 */
	public function run(): void {
		$vslas = [

		];

		App\Models\Vsla::insert($vslas);
	}
}
