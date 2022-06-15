<?php

namespace App\Imports;

use App\Models\Fasten;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FastenImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Fasten([
            //
            'fastenmedis' => $row['fastenmedis'], //pastikan judul sama
            'alamat' => $row['alamat'], 
            'kontak' => $row['kontak'], 
            'status' => $row['status'], 
            'child' => $row['child'], 
            'tipe' => $row['tipe'], 
            'wilayah' => $row['wilayah'], 
            'koordinat_long' => $row['koordinat_long'], 
            'koordinat_lat' => $row['koordinat_lat'],
        ]);
    }
}
