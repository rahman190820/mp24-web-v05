<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keluhanPasien extends Model
{
    use HasFactory;
    protected $fillable =[
        'pasien_id','dokter_id','keluhan','tanggal_dibuat','status'
    ];
}
