<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MvtcBeneficiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path('database/csv/mvtc.csv'), 'r');

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline) {
                DB::table('mvtc_beneficiaries')->insert([
                    'project_id' => $data[0],
                    'reg_number' => $data[1],
                    'name' => $data[2],
                    'gender' => $data[3],
                    'dob' => $data[4],
                    'residence_district' => $data[5],
                    'sector' => $data[6],
                    'cell' => $data[7],
                    'village' => $data[8],
                    'student_id_number' => $data[9],
                    'student_number' => $data[10],
                    'education_level' => $data[11],
                    'trade' => $data[12],
                    'payment_mode' => $data[13],
                    'intake' => $data[14],
                    'graduation_date' => $data[15],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
