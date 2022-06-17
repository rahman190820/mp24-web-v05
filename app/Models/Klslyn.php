<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klslyn extends Model
{
    use HasFactory;
    protected $fillable = ['kelas'];

    public function manfaats()
    {
        # code...
        return $this->belongsToMany(Manfaat::class,'klslyn_manfaats');
    }

}
