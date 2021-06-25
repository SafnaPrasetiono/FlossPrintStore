<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ulasanproduk extends Model
{
    // protect table ulasan produk
    protected $table = 'ulasanproduks';

    // make primary key
    public $primaryKey = 'id_ulasan';

    // protected file table produk
    protected $fillable = [
        'rating', 'tanggapan', 'balasan', 'tanggal', 'id_produk', 'id_user'
    ];

    public $timestamps = false;
}
