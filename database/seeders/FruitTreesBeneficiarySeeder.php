<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FruitTreesBeneficiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path('database/csv/fruits.csv'), 'r');
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline) {
                DB::table('fruit_trees_beneficiaries')->insert([
                    'name' => $data['0'],
                    'gender' => $data['1'],
                    'id_number' => $data['2'],
                    'sector' => $data['3'],
                    'cell' => $data['4'],
                    'village' => $data['5'],
                    'avocado' => $data['6'],
                    'mangoes' => $data['7'],
                    'oranges' => $data['8'],
                    'papaya' => $data['9'],
                    'telephone' => $data['10'],

                ]);

            }
            $firstline = false;

        }
        fclose($csvFile);
    }
}
