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
                    'vsla_name' => $data[0],
                    'name' => $data[1],
                    'gender' => $data[2],
                    'id_number' => $data[3],
                    'sector' => $data[4],
                    'cell' => $data[5],
                    'village' => $data[6],
                    'requested_loan' => $data[7],
                    'approved_loan' => $data[8],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
