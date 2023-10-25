<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            'user.index',
            'user.create',
            'user.show',
            'user.edit',
            'user.delete',
            'user.changerole',

            'kelas.index',
            'kelas.create',
            'kelas.show',
            'kelas.edit',
            'kelas.delete',
            'kelas.pilih',

            'transaksi.index',
            'transaksi.masuk',
            'transaksi.keluar',
            'transaksi.edit',
        ];

        foreach ($datas as $data) {
            Permission::create([
                'name' => $data
            ]);
        }
    }
}
