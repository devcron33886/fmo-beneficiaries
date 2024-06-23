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
                    'reg_number' => $data[0],
                    'name' => $data[1],
                    'gender' => $data[2],
                    'dob' => $data[3],
                    'residence_district' => $data[4],
                    'sector' => $data[5],
                    'cell' => $data[6],
                    'village' => $data[7],
                    'student_id_number' => $data[8],
                    'student_number' => $data[9],
                    'education_level' => $data[10],
                    'trade' => $data[11],
                    'payment_mode' => $data[12],
                    'intake' => $data[13],
                    'graduation_date' => $data[14],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
