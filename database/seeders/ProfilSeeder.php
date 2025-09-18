<?php

namespace Database\Seeders;

use App\Models\Profil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilSeeder extends Seeder
{
    public $profils = [
        [
            'name' => 'Kode PT',
            'type' => 'text'
        ],
        [
            'name' => 'Nomor SK UPPS',
            'type' => 'text'
        ],
        [
            'name' => 'Tanggal Berdiri',
            'type' => 'date'
        ],
        [
            'name' => 'Jumlah Dosen',
            'type' => 'text'
        ],
        [
            'name' => 'Jumlah Tenaga Kependidikan',
            'type' => 'text'
        ],
        [
            'name' => 'Kode Pos',
            'type' => 'text'
        ],
        [
            'name' => 'Telepon',
            'type' => 'text'
        ],
        [
            'name' => 'Website',
            'type' => 'text'
        ],
        [
            'name' => 'Email',
            'type' => 'email'
        ],
    ];
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->profils as $profil) {
            Profil::create([
                'name' => $profil['name'],
                'type' => $profil['type']
            ]);
        }
    }
}
