<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolFeedingBeneficiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path('database/csv/school_feeding.csv'), 'r');

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline) {
                DB::table('school_feeding_beneficiaries')->insert([
                    'name' => $data[0],
                    'grade' => $data[1],
                    'gender' => $data[2],
                    'school_name' => $data[3],
                    'trimester' => $data[4],
                    'school_phone' => $data[5],
                    'district' => $data[6],
                    'academic_year' => $data[7],
                    'sector' => $data[8],
                    'cell' => $data[9],
                    'village' => $data[10],
                    'father_name' => $data[11],
                    'mother_name' => $data[12],
                    'home_phone' => $data[13],
                    'status' => $data[14],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
