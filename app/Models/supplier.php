<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    // Izinkan nama, alamat, kode_pos untuk mass assignment
    protected $fillable = ['nama', 'alamat', 'kode_pos'];
   
}
