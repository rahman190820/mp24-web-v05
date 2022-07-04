<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Fasten extends  \Illuminate\Foundation\Auth\User
{
    use HasFactory, Notifiable;
    

    protected $fillable = [
        'email',
        'password',
        'type',
        'stts_approval_user',
        'stts_approval',
    ];

    //  exprt excel
    // protected $fillable = [
    //     'fastenmedis', 
    //     'alamat', 
    //     'kontak', 
    //     'status', 
    //     'parent', 
    //     'child', 
    //     'tipe', 
    //     'wilayah', 
    //     'koordinat_long', 
    //     'koordinat_lat', 
    //     'email', 
    //     'password',
    //     'type',
    // ];

      /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

      /**
     * Interact with the user's first name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function type(): Attribute
    {
        return new Attribute(
            // ada 8 user terhitung mulai 0
            get: fn ($value) =>  [  
                "pasienParent",
                "dokter",
                "apotik",
                "pasienChild",
                "lab",
                "validator",
                "manejemen",
                "support",
                "admin",
                "administrator",
                "klinik"][$value],
        );
    }
}
