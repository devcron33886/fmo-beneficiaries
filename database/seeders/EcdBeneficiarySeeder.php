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
                    'project_id' => $data[0],
                    'name' => $data[1],
                    'grade' => $data[2],
                    'gender' => $data[3],
                    'academic_year' => $data[4],
                    'father_name' => $data[5],
                    'father_id' => $data[6],
                    'mother_name' => $data[7],
                    'home_phone' => $data[8],
                    'sector' => $data[9],
                    'cell' => $data[10],
                    'village' => $data[11],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
