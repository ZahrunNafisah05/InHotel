<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    protected $fillable =[
        'namatipe', 'harga_tipe', 'deskripsi', 'fasilitas', 'kebijakan', 'jumlah_kamar'
    ];
}
