<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'name'=>'Pasien',
                'email'=>'pasien@mp24.com',
                'type'=>0,
                'password'=> bcrypt('123456'),
             ],
            [
               'name'=>'Dokter',
               'email'=>'dokter@mp24.com',
               'type'=>1,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Apotik',
               'email'=>'apotik@mp24.com',
               'type'=> 2,
               'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Turunan Pasien',
                'email'=>'pasienturunan@mp24.com',
                'type'=>3,
                'password'=> bcrypt('123456'),
             ],
            [
               'name'=>'Laboratorium',
               'email'=>'lab@mp24.com',
               'type'=>4,
               'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Validator',
                'email'=>'validator@mp24.com',
                'type'=>5,
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'Manejemen',
                'email'=>'manejemen@mp24.com',
                'type'=>6,
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'Support',
                'email'=>'support@mp24.com',
                'type'=>7,
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'Admin',
                'email'=>'admin@mp24.com',
                'type'=>8,
                'password'=> bcrypt('123456'),
             ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
