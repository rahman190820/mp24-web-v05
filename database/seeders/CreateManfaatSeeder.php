<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Manfaat;
class CreateManfaatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $manfaat_data = [
            ['nama_manfaat'=>'Kacamata','kode_manfaat'=>'KCM'],
            ['nama_manfaat'=>'Rawat Inap','kode_manfaat'=>'RWI'],
            ['nama_manfaat'=>'Paket Khusus','kode_manfaat'=>'MCU'],
            ['nama_manfaat'=>'Rawat Gigi','kode_manfaat'=>'RWG'],
            ['nama_manfaat'=>'Rawat Jalan','kode_manfaat'=>'RWJ']
        ];

        foreach ($manfaat_data as $key => $manfaat) {
            Manfaat::create($manfaat);
        }
    }
}
