<?php

namespace Database\Seeders;

use App\Models\Upps;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UppsSeeder extends Seeder
{
    public $uppses = [
        [
            'name' => 'Teknik',
            'initial' => 'FATEK',
            'color' => '#2E3B4E'
        ],
        [
            'name' => 'Pertanian',
            'initial' => 'FAPERTA',
            'color' => '#7C9D4F'
        ],
        [
            'name' => 'Hukum',
            'initial' => 'FH',
            'color' => '#5A3D2C'
        ],
        [
            'name' => 'Kedokteran',
            'initial' => 'FK',
            'color' => '#D6C9B4'
        ],
        [
            'name' => 'Keguruan dan Ilmu Pendidikan',
            'initial' => 'FKIP',
            'color' => '#F2A900'
        ],
        [
            'name' => 'Ilmu Sosial dan Ilmu Politik',
            'initial' => 'FISIP',
            'color' => '#3B6D8C'
        ],
        [
            'name' => 'Ekonomi dan Bisnis',
            'initial' => 'FEBIS',
            'color' => '#FF8C00'
        ],
        [
            'name' => 'Perikanan dan Ilmu Kelautan',
            'initial' => 'FPIK',
            'color' => '#1F77B4'
        ],
        [
            'name' => 'Sains dan Teknologi',
            'initial' => 'FST',
            'color' => '#FF5733'
        ],
        [
            'name' => 'Program Studi Diluar Kampus Utama',
            'initial' => 'PSDKU',
            'color' => '#FFB6C1'
        ],
        [
            'name' => 'Pascasarjana',
            'initial' => 'Pasca',
            'color' => '#4B0082'
        ],
    ];
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->uppses as $upps) {
            Upps::create([
                'name' => $upps['name'],
                'initial' => $upps['initial'],
                'color' => $upps['color']
            ]);
        }
    }
}
