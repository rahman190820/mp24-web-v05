<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manfaat extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_manfaat', 'kode_manfaat'
    ];

    public function klslyns()
    {
        # code...
        return $this->belongsToMany(Klslyn::class,'klslyn_manfaats');
    }

}
