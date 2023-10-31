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

            'sekolah.index',
            'sekolah.create',
            'sekolah.delete',
            'sekolah.edit',
            'sekolah.show',
            'sekolah.pilih',

            'transaksi.index',
            'transaksi.masuk',
            'transaksi.keluar',
            'transaksi.edit',

            'pengaturan.telegram',
        ];

        foreach ($datas as $data) {
            $permit = Permission::create([
                'name' => $data
            ]);
            $permit->assignRole('admin');

            if (in_array($data, ['transaksi.index', 'transaksi.masuk', 'transaksi.keluar', 'transaksi.edit'])) {
                $permit->assignRole('bendahara');
            }

            if (in_array($data, ['transaksi.index'])) {
                $permit->assignRole('siswa');
            }
        }
    }
}
