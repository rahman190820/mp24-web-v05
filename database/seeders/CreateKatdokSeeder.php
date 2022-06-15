<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Katdok;

class CreateKatdokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $katdok_data = [
            [
                'nama_katdok'=>'Dokter Umum'
            ],
            [ 'nama_katdok'=> 'Dokter Gigi'],
            [ 'nama_katdok'=> 'Dokter Spesialis Paru'],
            [ 'nama_katdok'=> 'Dokter Spesialis Anak'],
            [ 'nama_katdok'=> 'Dokter Spesialis Bedah'],
            [ 'nama_katdok'=> 'Dokter Spesialis Penyakit Dalam'],
            [ 'nama_katdok'=> 'Dokter Patologo Klinik'],
            [ 'nama_katdok'=> 'Dokter Spesilais Syaraf'],
            [ 'nama_katdok'=> 'Dokter Spesialis Mata'],
            [ 'nama_katdok'=> 'Dokter Spesialis Anastesi dan Perawatan Intensif'],
            [ 'nama_katdok'=> 'Dokter Spesialis Penyakit Kulit dan Kelamin'],
            [ 'nama_katdok'=> 'Dokter Spesialis THT-KL'],
            [ 'nama_katdok'=> 'Dokter Spesialis Kebidanan dan Kandungan'],
        ];

        foreach ($katdok_data as $key => $user) {
            Katdok::create($user);
        }
    }
}
