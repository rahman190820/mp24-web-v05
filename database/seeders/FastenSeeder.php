<?php

namespace Database\Seeders;

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
        $pengguna = [
            [
                'nama'=>'Pasien',
                'email'=>'pasien@mp24.com',
                'type'=>0,
                'password'=> bcrypt('123456'),
             ],
            [
               'nama'=>'Dokter',
               'email'=>'dokter@mp24.com',
               'type'=>1,
               'password'=> bcrypt('123456'),
            ],
            [
               'nama'=>'Apotik',
               'email'=>'apotik@mp24.com',
               'type'=> 2,
               'password'=> bcrypt('123456'),
            ],
            [
                'nama'=>'Turunan Pasien',
                'email'=>'pasienturunan@mp24.com',
                'type'=>3,
                'password'=> bcrypt('123456'),
             ],
            [
               'nama'=>'Laboratorium',
               'email'=>'lab@mp24.com',
               'type'=>4,
               'password'=> bcrypt('123456'),
            ],
            [
                'nama'=>'Validator',
                'email'=>'validator@mp24.com',
                'stts_approval_user'=>'Y',
                'type'=>5,
                'password'=> bcrypt('123456'),
             ],
             [
                'nama'=>'Manejemen',
                'email'=>'manejemen@mp24.com',
                'type'=>6,
                'password'=> bcrypt('123456'),
             ],
             [
                'nama'=>'Support',
                'email'=>'support@mp24.com',
                'type'=>7,
                'password'=> bcrypt('123456'),
             ],
             [
                'nama'=>'Admin',
                'email'=>'admin@mp24.com',
                'stts_approval_user'=>'Y',
                'type'=>8,
                'password'=> bcrypt('123456'),
             ],
             [
               'nama'=>'Administrator',
               'email'=>'administrator@mp24.com',
               'stts_approval_user'=>'Y',
               'type'=>9,
               'password'=> bcrypt('123456'),
            ],[
               'nama'=>'klinik',
               'email'=>'klinik@mp24.com',
               'type'=>10,
               'password'=> bcrypt('123456'),
            ],
        ];
    }
}
