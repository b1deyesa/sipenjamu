<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MonevTable;

class MonevTableSeeder extends Seeder
{
    public function run(): void
    {
        $tables = [
            [
                'name' => 'Data Mahasiswa',
                'slug' => 'mahasiswa',
                'fields' => json_encode([
                    ['name' => 'NIM', 'type' => 'string'],
                    ['name' => 'Nama', 'type' => 'string'],
                    ['name' => 'Angkatan', 'type' => 'integer'],
                ]),
            ],
            [
                'name' => 'Data Dosen',
                'slug' => 'dosen',
                'fields' => json_encode([
                    ['name' => 'NIP', 'type' => 'string'],
                    ['name' => 'Nama', 'type' => 'string'],
                    ['name' => 'Jabatan', 'type' => 'string'],
                ]),
            ],
            [
                'name' => 'Data Penelitian',
                'slug' => 'penelitian',
                'fields' => json_encode([
                    ['name' => 'Judul', 'type' => 'string'],
                    ['name' => 'Tahun', 'type' => 'integer'],
                    ['name' => 'Pendanaan', 'type' => 'string'],
                ]),
            ],
        ];

        foreach ($tables as $table) {
            MonevTable::updateOrCreate(
                ['slug' => $table['slug']],
                $table
            );
        }
    }
}