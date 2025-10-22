<?php

namespace Database\Seeders;

use App\Models\Upps;
use App\Models\Profil;
use App\Models\Periode;
use App\Models\ProfilUpps;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            $profil = Profil::create([
                'name' => $profil['name'],
                'type' => $profil['type']
            ]);
            
            $periodes = Periode::all();
            $uppses = Upps::all();

            foreach ($periodes as $periode) {
                foreach ($uppses as $upps) {
                    ProfilUpps::create([
                        'profil_id' => $profil->id,
                        'upps_id' => $upps->id,
                        'periode_id' => $periode->id,
                    ]);
                }
            }
        }
    }
}
