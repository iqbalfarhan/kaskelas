<?php

namespace Database\Seeders;

use App\Models\Sekolah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                "name" => "SMAN 1 Balikpapan",
                "address" => "Jl. Marsma R. Iswahyudi, Sepinggan, Kecamatan Balikpapan Selatan, Kota Balikpapan, Kalimantan Timur 76115",
                "logo" => null
            ],
            [
                "name" => "MAN Balikpapan",
                "address" => "JL. PRAPATAN NO. 10 PRAPATAN BALIKPAPAN KOTA",
                "logo" => null
            ]
        ];

        foreach ($datas as $data) {
            Sekolah::create($data);
        }
    }
}
