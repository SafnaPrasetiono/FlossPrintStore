<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bank extends Model
{
    // protected bank table
    protected $table = 'banks';

    protected $fillable = [
        'nama_bank', 'deskripsi', 'nomor_rekening'
    ];

    public $timestamps = false;
}
