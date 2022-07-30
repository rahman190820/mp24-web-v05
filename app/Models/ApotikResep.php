<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApotikResep extends Model
{
    use HasFactory;
    protected $fillable = ['id_obat','nama_obat','jumlah','harga','id_resep'];

    

}
