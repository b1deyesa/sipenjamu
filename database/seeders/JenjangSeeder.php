<?php

namespace Database\Seeders;

use App\Models\Jenjang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenjangSeeder extends Seeder
{
    public $jenjangs = [
        [
            'name' => 'Doktor',
            'initial' => 'S3',
            'color' => '#2E86AB'
        ],
        [
            'name' => 'Magister',
            'initial' => 'S2',
            'color' => '#1B9C85'
        ],
        [
            'name' => 'Profesi',
            'initial' => 'Profesi',
            'color' => '#F39C12'
        ],
        [
            'name' => 'Sarjana',
            'initial' => 'S1',
            'color' => '#E74C3C'
        ],
        [
            'name' => 'Sarjana Terapan',
            'initial' => 'S1 Terapan',
            'color' => '#9B59B6'
        ],
        [
            'name' => 'Diploma Tiga',
            'initial' => 'D3',
            'color' => '#3498DB'
        ],
        [
            'name' => 'Diploma Dua',
            'initial' => 'D2',
            'color' => '#F1C40F'
        ],
        [
            'name' => 'Diploma Satu',
            'initial' => 'D1',
            'color' => '#E67E22'
        ]
    ];    
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->jenjangs as $jenjang) {
            Jenjang::create([
                'name' => $jenjang['name'],
                'initial' => $jenjang['initial'],
                'color' => $jenjang['color']
            ]);
        }
    }
}
