<?php

namespace Database\Seeders;

use App\Models\Fasten;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FastenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $penggunas = [
         [
            'fastenmedis'=>'Dokter',
            'email'=>'dokter@mp24.com',
            'type'=> 1,
            'password'=> bcrypt('123456'),
         ],
            // [
            //    'fastenmedis'=>'Apotik',
            //    'email'=>'apotik@mp24.com',
            //    'type'=> 2,
            //    'password'=> bcrypt('123456'),
            // ],
            // [
            //    'fastenmedis'=>'Laboratorium',
            //    'email'=>'lab@mp24.com',
            //    'type'=>4,
            //    'password'=> bcrypt('123456'),
            // ],
            // [
            //     'fastenmedis'=>'Validator',
            //     'email'=>'validator@mp24.com',
            //     'stts_approval_user'=>'Y',
            //     'type'=>5,
            //     'password'=> bcrypt('123456'),
            //  ],
            //  [
            //     'fastenmedis'=>'Manejemen',
            //     'email'=>'manejemen@mp24.com',
            //     'type'=>6,
            //     'password'=> bcrypt('123456'),
            //  ],
            //  [
            //     'fastenmedis'=>'Support',
            //     'email'=>'support@mp24.com',
            //     'type'=>7,
            //     'password'=> bcrypt('123456'),
            //  ],
            //  [
            //     'fastenmedis'=>'Admin',
            //     'email'=>'admin@mp24.com',
            //     'stts_approval_user'=>'Y',
            //     'type'=>8,
            //     'password'=> bcrypt('123456'),
            //  ],
            //  [
            //    'fastenmedis'=>'Administrator',
            //    'email'=>'administrator@mp24.com',
            //    'stts_approval_user'=>'Y',
            //    'type'=>9,
            //    'password'=> bcrypt('123456'),
            // ],[
            //    'fastenmedis'=>'klinik',
            //    'email'=>'klinik@mp24.com',
            //    'type'=>10,
            //    'password'=> bcrypt('123456'),
            // ],
        ];

        foreach ($penggunas as $key => $pengguna) {
         Fasten::create($pengguna);
     }

    }
}
