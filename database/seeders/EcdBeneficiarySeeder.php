<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EcdBeneficiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path('database/csv/ecd.csv'), 'r');

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline) {
                DB::table('ecd_beneficiaries')->insert([
                    'name' => $data[0],
                    'grade' => $data[1],
                    'gender' => $data[2],
                    'academic_year' => $data[3],
                    'father_name' => $data[4],
                    'father_id' => $data[5],
                    'mother_name' => $data[6],
                    'home_phone' => $data[7],
                    'sector' => $data[8],
                    'cell' => $data[9],
                    'village' => $data[10],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
