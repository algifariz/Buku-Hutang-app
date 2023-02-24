<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hutang extends Model
{
    use HasFactory;

    protected $table = 'data_hutang';
    protected $fillable = [
        'kode_pelanggan',
        'nama_pelanggan',
        'tanggal',
        'jumlah_hutang',
        'status'
    ];
}
