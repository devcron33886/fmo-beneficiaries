<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VslaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path('database/csv/vsla.csv'), 'r');
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline) {
                DB::table('vslas')->insert([
                    'code' => $data[0],
                    'name' => $data[1],
                    'represeter_name' => $data[2],
                    'representer_id_number' => $data[3],
                    'represnter_phone' => $data[4],
                    'sector' => $data[5],
                    'cell' => $data[6],
                    'village' => $data[7],
                    'year_of_entry' => $data[8],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
