<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    { 
        \Log::info('Seeding 100 users into the database.');
        User::factory(100)->create();
       
        User::create([
            'role' => 'admin',
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'password' => 'admin123',
        ]);

        $this->call([CarSeeder::class]);
    }
}