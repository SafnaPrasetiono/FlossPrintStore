<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fotoproduk extends Model
{
    // protected foto produk table
    protected $table = 'fotoproduks';

    protected $fillable = [
        'namafoto', 'ukuran', 'lokasi', 'id_produk'
    ];

    public $timestamps = false;
}
