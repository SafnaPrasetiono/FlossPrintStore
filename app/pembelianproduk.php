<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembelianproduk extends Model
{
    // protected table pembelianproduks
    protected $table = 'pembelianproduks';

    protected $fillable = [
        'id_produk','namaproduk', 'jenisproduk', 'ukuranproduk', 'panjang', 'lebar', 'beratproduk', 'jumlah', 'hargaproduk', 'totalharga', 'id_pembelian', 'id_ulasan'
    ];

    public $timestamps = false;
}
