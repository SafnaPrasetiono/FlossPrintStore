<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    // protected table pembayarans
    protected $table = 'pembayarans';

    protected $fillable = [
        'penyetor', 'bank', 'harga', 'tanggal', 'jam', 'bukti', 'id_pembelian'
    ];

    public $timestamps = false;
}
