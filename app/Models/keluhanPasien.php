<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keluhanPasien extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_keluhan';
    protected $fillable =[
        'pasien_id',
        'dokter_id',
        'keluhan',
        'diagnosa',
        'tanggal_dibuat',
        'status'
    ];
}
