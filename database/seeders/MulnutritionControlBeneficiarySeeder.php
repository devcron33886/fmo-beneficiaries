<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MulnutritionControlBeneficiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path('database/csv/malnutrition.csv'), 'r');

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline) {
                DB::table('mulnutrition_control_beneficiaries')->insert([
                    'name' => $data[0],
                    'gender' => $data[1],
                    'age_or_months' => $data[2],
                    'associated_health_center' => $data[3],
                    'sector' => $data[4],
                    'cell' => $data[5],
                    'village' => $data[6],
                    'father_name' => $data[7],
                    'mother_name' => $data[8],
                    'home_tel' => $data[9],
                    'package_reception_date' => $data[10],
                    'entry_muac' => $data[11],
                    'current_muac' => $data[12],
                    'nutrition_status' => $data[13],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
