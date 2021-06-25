<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    // protected produk table
    protected $table = 'produks';

    public $primaryKey = 'id_produk';

    // protected file table produk
    protected $fillable = [
        'namaproduk', 'harga', 'stok', 'terjual', 'jenis', 'ukuran', 'panjang', 'lebar', 'berat', 'samplefoto', 'tanggal', 'deskripsi'
    ];

    public $timestamps = false;
}
