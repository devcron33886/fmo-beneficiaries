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
                    'project_id' => $data[0],
                    'name' => $data[1],
                    'gender' => $data[2],
                    'age_or_months' => $data[3],
                    'associated_health_center' => $data[4],
                    'sector' => $data[5],
                    'cell' => $data[6],
                    'village' => $data[7],
                    'father_name' => $data[8],
                    'mother_name' => $data[9],
                    'home_tel' => $data[10],
                    'package_reception_date' => $data[11],
                    'entry_muac' => $data[12],
                    'current_muac' => $data[13],
                    'nutrition_status' => $data[14],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
