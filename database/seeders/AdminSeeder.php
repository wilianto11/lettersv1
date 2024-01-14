<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            "name" => "Admin Surat",
            "nip" => "197505182014061011",
            "password" => bcrypt("bekasi2024"),
            "roleid" => 1,
            "jabatan" => "Admin"
        ]);

        User::create([
            "name" => "Supiyadi, S.H.,M.H",
            "nip" => "198307312001121012",
            "password" => bcrypt("bekasi2024"),
            "roleid" => 2,
            "jabatan" => "KEPALA BAGIAN HUKUM"
        ]);

        User::create([
            "name" => "Sekretaris Hukum",
            "nip" => "197508162001121013",
            "password" => bcrypt("bekasi2024"),
            "roleid" => 3,
            "jabatan" => "SEKRETARIS"
        ]);

        User::create([
            "name" => "Wilianto",
            "nip" => "198501202014061014",
            "password" => bcrypt("bekasi2024"),
            "roleid" => 4,
            "jabatan" => "OPERATOR"
        ]);

        User::create([
            "name" => "Haryanto, S.H",
            "nip" => "197809152009011015",
            "password" => bcrypt("bekasi2024"),
            "roleid" => 5,
            "jabatan" => "KASUBAG BANTUAN HUKUM"
        ]);

        User::create([
            "name" => "Yogi Prayogi, S.H",
            "nip" => "196511271993031016",
            "password" => bcrypt("bekasi2024"),
            "roleid" => 5,
            "jabatan" => "KASUBAG PERANCANG PERATURAN PERUNDANG UNDANGAN"
        ]);

        User::create([
            "name" => "Joko Mulyono, S.H",
            "nip" => "197912231999011017",
            "password" => bcrypt("bekasi2024"),
            "roleid" => 5,
            "jabatan" => "KASUBAG PENGKAJIAN HUKUM"
        ]);


    }
}
