<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembelian extends Model
{
    // protect table pembelian
    protected $table = 'pembelians';

    protected $fillable = [
        'harga', 'tanggal', 'status', 'id_user', 'id_pengiriman', 'id_bank'
    ];

    public $timestamps = false;
}
