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
                    'project_id' => $data[0],
                    'name' => $data['1'],
                    'gender' => $data['2'],
                    'id_number' => $data['3'],
                    'sector' => $data['4'],
                    'cell' => $data['4'],
                    'village' => $data['6'],
                    'avocado' => $data['7'],
                    'mangoes' => $data['8'],
                    'oranges' => $data['9'],
                    'papaya' => $data['10'],
                    'telephone' => $data['11'],

                ]);

            }
            $firstline = false;

        }
        fclose($csvFile);
    }
}
