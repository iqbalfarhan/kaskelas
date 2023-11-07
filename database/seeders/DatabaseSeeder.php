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
            SekolahSeeder::class,
            KelasSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
        ]);

        $user = User::create([
            'name' => 'Iqbal Farhan Syuhada',
            'username' => 'super',
            'nis' => "132010040002",
            'active' => true,
            'password' => Hash::make('youfi123'),
        ]);
        $user->assignRole('superadmin');

        $admin = User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'nis' => "123456",
            'active' => true,
            'password' => Hash::make('youfi123'),
        ]);
        $admin->assignRole('admin');

        $this->call([
            UserSeeder::class,
        ]);
    }
}
