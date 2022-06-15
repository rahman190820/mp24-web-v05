<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Klslyn;

class CreateKlslynSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kls = [
            ['kelas'=>'KLS1'],
            ['kelas'=>'KLS2'],
            ['kelas'=>'KLS3'],
            ['kelas'=>'VIP1'],
            ['kelas'=>'VIP2'],
            ['kelas'=>'VIP3'],
            ['kelas'=>'PREM'],
        ];

        foreach ($kls as $key => $klslyn) {
            # code...
            Klslyn::create($klslyn);
        }

    }
}
