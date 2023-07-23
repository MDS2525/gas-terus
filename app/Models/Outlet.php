<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_outlet',
        'telp_outlet',
        'alamat_outlet'
    ];

    public $timestamps = true; // Aktifkan fitur timestamp
}
