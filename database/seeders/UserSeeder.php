<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        $datas = [
            ["name" => "Ahmad Rizky", "kelas_id" => 1, "nis" => "1101"],
            ["name" => "Bella Gunawan", "kelas_id" => 1, "nis" => "1102"],
            ["name" => "Candra Putri", "kelas_id" => 1, "nis" => "1103"],
            ["name" => "Dian Effendi", "kelas_id" => 1, "nis" => "1104"],
            ["name" => "Eka Rahmawati", "kelas_id" => 1, "nis" => "1105"],
            ["name" => "Fadli Gustav", "kelas_id" => 1, "nis" => "1106"],
            ["name" => "Gita Dinrah", "kelas_id" => 1, "nis" => "1107"],
            ["name" => "Hadi Yusuf", "kelas_id" => 1, "nis" => "1108"],
            ["name" => "Ina Naya", "kelas_id" => 1, "nis" => "1109"],
            ["name" => "Joko Yudha", "kelas_id" => 1, "nis" => "1110"],
            ["name" => "Indra Sugih", "kelas_id" => 1, "nis" => "1111"],
            ["name" => "Siti Rahmawati", "kelas_id" => 1, "nis" => "1112"],
            ["name" => "Zara Suranto", "kelas_id" => 1, "nis" => "1113"],
            ["name" => "Muhammad Dani", "kelas_id" => 1, "nis" => "1114"],
            ["name" => "Yanto Kudus", "kelas_id" => 1, "nis" => "1115"],
            ["name" => "Adi Apriansah", "kelas_id" => 2, "nis" => "1201"],
            ["name" => "Dodi Gunawan", "kelas_id" => 2, "nis" => "1202"],
            ["name" => "Gilang Hendri", "kelas_id" => 2, "nis" => "1203"],
            ["name" => "Felix Wiyanto", "kelas_id" => 2, "nis" => "1204"],
            ["name" => "Mira Syafira", "kelas_id" => 2, "nis" => "1205"],
            ["name" => "Adinda Fitri", "kelas_id" => 2, "nis" => "1206"],
            ["name" => "Mutiara Siregar", "kelas_id" => 2, "nis" => "1207"],
            ["name" => "Catherine Felicia", "kelas_id" => 2, "nis" => "1208"],
            ["name" => "Wawan Tulung", "kelas_id" => 2, "nis" => "1209"],
            ["name" => "Sudarmi Sudrawati", "kelas_id" => 2, "nis" => "1210"],
            ["name" => "Rina Abisatya", "kelas_id" => 2, "nis" => "1211"],
            ["name" => "Nisa Azzahra", "kelas_id" => 2, "nis" => "1212"],
            ["name" => "Vina Salsabila", "kelas_id" => 2, "nis" => "1213"],
            ["name" => "Oki Fedriana", "kelas_id" => 2, "nis" => "1214"],
            ["name" => "Natasya Meydita", "kelas_id" => 2, "nis" => "1215"]
        ];

        foreach ($datas as $data) {
            $nis = $data['nis'];
            $data['username'] = $nis;
            $data['password'] = Hash::make($nis);
            $user = User::create($data);

            if (in_array($data['nis'], ['1101', '1201'])) {
                $user->assignRole('bendahara');
            } else {
                $user->assignRole('siswa');
            }
        }
    }
}
