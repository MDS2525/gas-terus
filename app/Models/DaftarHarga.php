<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarHarga extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'kilogram',
        'harga'
    ];

    public $timestamps = true; // Aktifkan fitur timestamp
}
