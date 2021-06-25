<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengiriman extends Model
{
    // protected table pengiriman
    protected $table = 'pengiriman';

    protected $fillable = [
        'provinsi', 'kota', 'alamat', 'kodepos', 'expedisi', 'layanan', 'harga', 'resi', 'id_pembelian',
    ];

    public $timestamps = false;

}
