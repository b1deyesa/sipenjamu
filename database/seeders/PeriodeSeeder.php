<?php

namespace Database\Seeders;

use App\Models\Periode;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $periodes = [
            [
                'name' => '2023/2024',
                'start_date' => '2023-07-01',
                'end_date' => '2024-06-30',
                'is_active' => false,
            ],
            [
                'name' => '2024/2025',
                'start_date' => '2024-07-01',
                'end_date' => '2025-06-30',
                'is_active' => false,
            ],
            [
                'name' => '2025/2026',
                'start_date' => '2025-07-01',
                'end_date' => '2026-06-30',
                'is_active' => false,
            ],
        ];

        foreach ($periodes as $periode) {
            Periode::updateOrCreate(
                ['name' => $periode['name']],
                $periode
            );
        }
    }
}
