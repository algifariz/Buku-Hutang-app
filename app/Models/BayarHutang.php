<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BayarHutang extends Model
{
    use HasFactory;
    protected $table = 'data_bayar';
    protected $fillable = [
        'kode_pelanggan',
        'nama_pelanggan',
        'jumlah_bayar',
    ];

    public function hutang()
    {
        return $this->belongsTo(Hutang::class, 'kode_pelanggan', 'kode_pelanggan');
    }
}
