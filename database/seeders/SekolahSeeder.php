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
                "name" => "SMKN 1 Balikpapan",
                "address" => "Jl. Marsma R. Iswahyudi, Sepinggan, Kecamatan Balikpapan Selatan, Kota Balikpapan, Kalimantan Timur 76115",
                "logo" => "sekolah/VZZ48wOj0AknkiZNYeZrbf5Ki2Pim9XicNdC1MLA.png"
            ],
            [
                "name" => "MAN Balikpapan",
                "address" => "JL. PRAPATAN NO. 10 PRAPATAN BALIKPAPAN KOTA",
                "logo" => "sekolah/e0tJad9CdS9HSOc6NqvOaCORbONUaMidsGryZae1.png"
            ]
        ];

        foreach ($datas as $data) {
            Sekolah::create($data);
        }
    }
}
