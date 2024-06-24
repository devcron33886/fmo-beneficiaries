<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MicrocreditBeneficiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path('database/csv/microcredit.csv'), 'r');

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline) {
                DB::table('microcredit_beneficiaries')->insert([
                    'project_id' => $data[0],
                    'vsla_name' => $data[1],
                    'name' => $data[2],
                    'gender' => $data[3],
                    'id_number' => $data[4],
                    'sector' => $data[5],
                    'cell' => $data[6],
                    'village' => $data[7],
                    'requested_loan' => $data[8],
                    'approved_loan' => $data[9],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
