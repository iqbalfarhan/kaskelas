<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'name' => 'XI-1',
                'angkatan' => '2023/2024',
                'walikelas' => '...',
                'telegram_group_id' => '-4048544344',
                'sekolah_id' => 1,
            ],
            [
                'name' => 'XI-2',
                'angkatan' => '2023/2024',
                'walikelas' => '...',
                'sekolah_id' => 1,
            ]
        ];

        foreach ($datas as $data) {
            Kelas::create($data);
        }
    }
}
