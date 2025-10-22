<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PeriodeSeeder::class,
            RoleSeeder::class,
            UppsSeeder::class,
            JenjangSeeder::class,
            ProgramStudiSeeder::class,
            ProfilSeeder::class,
            // MonevTableSeeder::class
        ]);
        
        $user = User::factory()->create([
            'name' => 'Bideyesa',
            'email' => 'test@gmail.com',
            'password' => Hash::make('123')
        ]);
        
        $user->roles()->sync([1,2]);
        $user->uppses()->sync([1,2]);
    }
}
