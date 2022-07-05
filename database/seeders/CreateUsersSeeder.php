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
                'nama'=>'Pasien',
                'email'=>'pasien@mp24.com',
                'type'=>0,
                'password'=> bcrypt('123456'),
             ],
          
          
            [
                'nama'=>'Turunan Pasien',
                'email'=>'pasienturunan@mp24.com',
                'type'=>3,
                'password'=> bcrypt('123456'),
             ],
           
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
