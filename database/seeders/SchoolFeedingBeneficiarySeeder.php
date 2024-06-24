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
                    'project_id' => $data[0],
                    'name' => $data[1],
                    'grade' => $data[2],
                    'gender' => $data[3],
                    'school_name' => $data[4],
                    'trimester' => $data[5],
                    'school_phone' => $data[6],
                    'district' => $data[7],
                    'academic_year' => $data[8],
                    'sector' => $data[9],
                    'cell' => $data[10],
                    'village' => $data[11],
                    'father_name' => $data[12],
                    'mother_name' => $data[13],
                    'home_phone' => $data[14],
                    'status' => $data[15],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
