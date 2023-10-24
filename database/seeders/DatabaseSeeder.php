<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
            RoleSeeder::class,
            KelasSeeder::class,
        ]);

        $user = User::create([
            'name' => 'Superadmin',
            'username' => 'admin',
            'password' => Hash::make('adminoke'),
        ]);

        $user->assignRole('superadmin');
    }
}
