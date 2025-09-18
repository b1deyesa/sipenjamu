<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    public $roles = [
        [
            'name' => 'admin',
            'display_name' => 'Admin SiPenjamu',
        ],
        [
            'name' => 'enumerator',
            'display_name' => 'Enumerator',
        ],
        [
            'name' => 'executive',
            'display_name' => 'Executive',
        ],
        [
            'name' => 'evaluator',
            'display_name' => 'Evaluator',
        ],
        [
            'name' => 'auditor',
            'display_name' => 'Auditor',
        ],
        [
            'name' => 'assessor',
            'display_name' => 'Assessor',
        ]
    ];
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->roles as $role) {
            Role::create([
                'name' => $role['name'],
                'display_name' => $role['display_name']
            ]);
        }
    }
}
