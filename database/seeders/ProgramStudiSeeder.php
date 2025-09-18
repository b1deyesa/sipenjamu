<?php

namespace Database\Seeders;

use App\Models\ProgramStudi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramStudiSeeder extends Seeder
{
    public $program_studis = [
        ['upps_id' => 7, 'jenjang_id' => 4, 'name' => 'Manajemen'],
        ['upps_id' => 7, 'jenjang_id' => 4, 'name' => 'Ekonomi Pembangunan'],
        ['upps_id' => 7, 'jenjang_id' => 4, 'name' => 'Akuntansi'],
        ['upps_id' => 3, 'jenjang_id' => 4, 'name' => 'Ilmu Hukum'],
        ['upps_id' => 6, 'jenjang_id' => 4, 'name' => 'Ilmu Administrasi Negara'],
        ['upps_id' => 6, 'jenjang_id' => 4, 'name' => 'Ilmu Komunikasi'],
        ['upps_id' => 6, 'jenjang_id' => 4, 'name' => 'Sosiologi'],
        ['upps_id' => 6, 'jenjang_id' => 4, 'name' => 'Ilmu Pemerintahan'],
        ['upps_id' => 4, 'jenjang_id' => 4, 'name' => 'Pendidikan Dokter'],
        ['upps_id' => 4, 'jenjang_id' => 4, 'name' => 'Kedokteran Gigi'],
        ['upps_id' => 4, 'jenjang_id' => 3, 'name' => 'Pendidikan Profesi Dokter Gigi'],
        ['upps_id' => 5, 'jenjang_id' => 4, 'name' => 'Pendidikan Jasmani, Kesehatan & Rekreasi'],
        ['upps_id' => 5, 'jenjang_id' => 4, 'name' => 'Pendidikan Sejarah'],
        ['upps_id' => 5, 'jenjang_id' => 4, 'name' => 'Pendidikan Bahasa Jerman'],
        ['upps_id' => 5, 'jenjang_id' => 4, 'name' => 'Pendidikan Biologi'],
        ['upps_id' => 5, 'jenjang_id' => 4, 'name' => 'Pendidikan Bahasa Dan Sastra Indonesia'],
        ['upps_id' => 5, 'jenjang_id' => 3, 'name' => 'Pendidikan Profesi Guru'],
        ['upps_id' => 5, 'jenjang_id' => 4, 'name' => 'Bimbingan Dan Konseling'],
        ['upps_id' => 5, 'jenjang_id' => 4, 'name' => 'Pendidikan Bahasa Inggris'],
        ['upps_id' => 5, 'jenjang_id' => 4, 'name' => 'Pendidikan Kimia'],
        ['upps_id' => 5, 'jenjang_id' => 4, 'name' => 'Pendidikan Fisika'],
        ['upps_id' => 5, 'jenjang_id' => 4, 'name' => 'Pendidikan Guru Sekolah Dasar'],
        ['upps_id' => 5, 'jenjang_id' => 4, 'name' => 'Pendidikan Luar Sekolah'],
        ['upps_id' => 5, 'jenjang_id' => 4, 'name' => 'Pendidikan Matematika'],
        ['upps_id' => 5, 'jenjang_id' => 1, 'name' => 'Administrasi Pendidikan'],
        ['upps_id' => 5, 'jenjang_id' => 4, 'name' => 'Administrasi Pendidikan'],
        ['upps_id' => 5, 'jenjang_id' => 4, 'name' => 'Pendidikan Ekonomi'],
        ['upps_id' => 5, 'jenjang_id' => 4, 'name' => 'Pendidikan Pancasila Dan Kewarganegaraan'],
        ['upps_id' => 5, 'jenjang_id' => 4, 'name' => 'Pendidikan Akuntansi'],
        ['upps_id' => 11, 'jenjang_id' => 2, 'name' => 'Pengelolaan Lahan'],
        ['upps_id' => 11, 'jenjang_id' => 2, 'name' => 'Ilmu Kelautan'],
        ['upps_id' => 11, 'jenjang_id' => 2, 'name' => 'Manajemen Hutan'],
        ['upps_id' => 11, 'jenjang_id' => 2, 'name' => 'Agribisnis'],
        ['upps_id' => 11, 'jenjang_id' => 2, 'name' => 'Ilmu Ekonomi'],
        ['upps_id' => 11, 'jenjang_id' => 2, 'name' => 'Pendidikan Biologi'],
        ['upps_id' => 11, 'jenjang_id' => 2, 'name' => 'Ilmu Hukum'],
        ['upps_id' => 11, 'jenjang_id' => 2, 'name' => 'Pendidikan Matematika'],
        ['upps_id' => 11, 'jenjang_id' => 2, 'name' => 'Ilmu Pertanian'],
        ['upps_id' => 11, 'jenjang_id' => 2, 'name' => 'Sosiologi'],
        ['upps_id' => 11, 'jenjang_id' => 2, 'name' => 'Administrasi Publik'],
        ['upps_id' => 11, 'jenjang_id' => 2, 'name' => 'Manajemen Sumberdaya Kelautan dan Pulau-pulau Kecil'],
        ['upps_id' => 11, 'jenjang_id' => 1, 'name' => 'Ilmu Hukum'],
        ['upps_id' => 11, 'jenjang_id' => 2, 'name' => 'Kimia'],
        ['upps_id' => 11, 'jenjang_id' => 1, 'name' => 'Ilmu Kelautan'],
        ['upps_id' => 11, 'jenjang_id' => 2, 'name' => 'Manajemen Pendidikan'],
        ['upps_id' => 11, 'jenjang_id' => 2, 'name' => 'Pendidikan Bahasa Jerman'],
        ['upps_id' => 11, 'jenjang_id' => 2, 'name' => 'Pendidikan Bahasa Inggris'],
        ['upps_id' => 11, 'jenjang_id' => 1, 'name' => 'Pendidikan Biologi'],
        ['upps_id' => 11, 'jenjang_id' => 2, 'name' => 'Manajemen'],
        ['upps_id' => 11, 'jenjang_id' => 1, 'name' => 'Ilmu Pertanian'],
        ['upps_id' => 11, 'jenjang_id' => 1, 'name' => 'Pendidikan Matematika'],
        ['upps_id' => 11, 'jenjang_id' => 2, 'name' => 'Pendidikan Pancasila dan Kewarganegaraan'],
        ['upps_id' => 8, 'jenjang_id' => 4, 'name' => 'Budidaya Perairan'],
        ['upps_id' => 8, 'jenjang_id' => 4, 'name' => 'Agrobisnis Perikanan'],
        ['upps_id' => 8, 'jenjang_id' => 4, 'name' => 'Ilmu Kelautan'],
        ['upps_id' => 8, 'jenjang_id' => 4, 'name' => 'Pemanfaatan Sumber Daya Perikanan'],
        ['upps_id' => 8, 'jenjang_id' => 4, 'name' => 'Teknologi Hasil Perikanan'],
        ['upps_id' => 8, 'jenjang_id' => 4, 'name' => 'Manajemen Sumber Daya Perairan'],
        ['upps_id' => 2, 'jenjang_id' => 4, 'name' => 'Penyuluhan Pertanian'],
        ['upps_id' => 2, 'jenjang_id' => 4, 'name' => 'Ilmu Tanah'],
        ['upps_id' => 2, 'jenjang_id' => 4, 'name' => 'Pemuliaan Tanamen'],
        ['upps_id' => 2, 'jenjang_id' => 4, 'name' => 'Kehutanan'],
        ['upps_id' => 2, 'jenjang_id' => 4, 'name' => 'Teknologi Hasil Pertanian'],
        ['upps_id' => 2, 'jenjang_id' => 4, 'name' => 'Agroteknologi'],
        ['upps_id' => 2, 'jenjang_id' => 4, 'name' => 'Peternakan'],
        ['upps_id' => 2, 'jenjang_id' => 4, 'name' => 'Agribisnis'],
        ['upps_id' => 2, 'jenjang_id' => 4, 'name' => 'Ilmu Lingkungan'],
        ['upps_id' => 2, 'jenjang_id' => 4, 'name' => 'Pengelolaan Hutan'],
        ['upps_id' => 10, 'jenjang_id' => 4, 'name' => 'Pendidikan Matematika (Kampus Kab. Maluku Barat Daya)'],
        ['upps_id' => 10, 'jenjang_id' => 4, 'name' => 'Hukum (Kampus Kab. Kepulauan Aru)'],
        ['upps_id' => 10, 'jenjang_id' => 4, 'name' => 'Akuntansi (Kampus Kab. Maluku Barat Daya)'],
        ['upps_id' => 10, 'jenjang_id' => 4, 'name' => 'Pendidikan Jasmani (Kampus Kab. Kepulauan Aru)'],
        ['upps_id' => 10, 'jenjang_id' => 4, 'name' => 'Hukum (Kampus Kab Maluku Barat Daya)'],
        ['upps_id' => 10, 'jenjang_id' => 4, 'name' => 'Peternakan (Kampus Kab. Maluku Barat Daya)'],
        ['upps_id' => 10, 'jenjang_id' => 4, 'name' => 'Pendidikan Matematika (Kampus Kab Kepulauan Aru)'],
        ['upps_id' => 10, 'jenjang_id' => 4, 'name' => 'Akuntansi (Kampus Kab. Kepulauan Aru)'],
        ['upps_id' => 10, 'jenjang_id' => 4, 'name' => 'Pendidikan Guru Sekolah Dasar (kampus Kab Aru)'],
        ['upps_id' => 10, 'jenjang_id' => 4, 'name' => 'Pendidikan Bahasa Inggris (Kampus Kab. Maluku Barat Daya)'],
        ['upps_id' => 10, 'jenjang_id' => 4, 'name' => 'Pendidikan Bahasa Inggris (Kampus Kab. Kepulauan Aru)'],
        ['upps_id' => 10, 'jenjang_id' => 4, 'name' => 'Pendidikan Guru Sekolah Dasar (Kampus Kab. Maluku Barat Daya)'],
        ['upps_id' => 10, 'jenjang_id' => 4, 'name' => 'Pendidikan Geografi'],
        ['upps_id' => 9, 'jenjang_id' => 4, 'name' => 'Matematika'],
        ['upps_id' => 9, 'jenjang_id' => 4, 'name' => 'Biologi'],
        ['upps_id' => 9, 'jenjang_id' => 4, 'name' => 'Fisika'],
        ['upps_id' => 9, 'jenjang_id' => 4, 'name' => 'Ilmu Komputer'],
        ['upps_id' => 9, 'jenjang_id' => 4, 'name' => 'Bioteknologi'],
        ['upps_id' => 9, 'jenjang_id' => 4, 'name' => 'Statistika'],
        ['upps_id' => 9, 'jenjang_id' => 4, 'name' => 'Kimia'],
        ['upps_id' => 9, 'jenjang_id' => 4, 'name' => 'Farmasi'],
        ['upps_id' => 9, 'jenjang_id' => 4, 'name' => 'Keselamatan dan Kesehatan Kerja'],
        ['upps_id' => 9, 'jenjang_id' => 4, 'name' => 'Rekayasa Instrumentasi dan Otomasi'],
        ['upps_id' => 9, 'jenjang_id' => 4, 'name' => 'Sains Biomedis'],
        ['upps_id' => 1, 'jenjang_id' => 4, 'name' => 'Teknik Mesin'],
        ['upps_id' => 1, 'jenjang_id' => 4, 'name' => 'Teknik Sistem Perkapalan'],
        ['upps_id' => 1, 'jenjang_id' => 4, 'name' => 'Perencanaan Wilayah dan Kota'],
        ['upps_id' => 1, 'jenjang_id' => 4, 'name' => 'Teknik Geofisika'],
        ['upps_id' => 1, 'jenjang_id' => 4, 'name' => 'Teknik Perminyakan'],
        ['upps_id' => 1, 'jenjang_id' => 4, 'name' => 'Teknik Geologi'],
        ['upps_id' => 1, 'jenjang_id' => 4, 'name' => 'Teknik Industri'],
        ['upps_id' => 1, 'jenjang_id' => 4, 'name' => 'Teknik Kimia'],
        ['upps_id' => 1, 'jenjang_id' => 4, 'name' => 'Teknik Perkapalan'],
        ['upps_id' => 1, 'jenjang_id' => 4, 'name' => 'Teknik Sipil'],
        ['upps_id' => 1, 'jenjang_id' => 4, 'name' => 'Teknik Transportasi Laut']
    ];
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->program_studis as $program_studi) {
            ProgramStudi::create([
                'upps_id' => $program_studi['upps_id'],
                'jenjang_id' => $program_studi['jenjang_id'],
                'name' => $program_studi['name']
            ]);
        }
    }
}
