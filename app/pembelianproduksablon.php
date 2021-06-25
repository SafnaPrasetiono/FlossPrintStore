<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembelianproduksablon extends Model
{
    // protect table pembelian
    protected $table = 'pembelianproduksablons';

    protected $fillable = [
        'bahan', 'warnapakaian', 'tipesablon', 'jumlah', 'ukuran', 'panjang', 'lebar', 'berat', 'harga', 'totalharga', 'foto_depan', 'foto_belakang', 'id_pembelian'
    ];

    public $timestamps = false;
}
