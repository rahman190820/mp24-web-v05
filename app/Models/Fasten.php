<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasten extends Model
{
    use HasFactory;
    protected $fillable = [
        'fastenmedis', 
        'alamat', 
        'kontak', 
        'status', 
        'child', 
        'tipe', 
        'wilayah', 
        'koordinat_long', 
        'koordinat_lat', 
        'Email', 
        'Image',
    ];
}
