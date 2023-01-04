<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    // Membuat sebuah model untuk database
    use HasFactory;
    protected $table = 'pemasukan';
    protected $fillable = ['npm', 'nama', 'alamat', 'nominalKas', 'tanggalKas'];
}
