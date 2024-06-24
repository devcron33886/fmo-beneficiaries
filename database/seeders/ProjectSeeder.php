<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'name' => 'ECD Kimaranzara',
            ],
            [
                'name' => 'Malnutrition Control',
            ],
            [
                'name' => 'School Feeding',
            ],
            [
                'name' => 'Zamuka',
            ],
            [
                'name' => 'MVTC',
            ],
            [
                'name' => 'Fruit Trees',
            ],
            [
                'name' => 'Nursing Scholarship',
            ],
            [
                'name' => 'Microcredit',
            ],

            [
                'name' => 'Toolkits',
            ],
        ];
        Project::insert($projects);
    }
}
