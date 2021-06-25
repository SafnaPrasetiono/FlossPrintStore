<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prosessablon extends Model
{
    protected $table = 'prosessablons';

    public $primaryKey = 'id_proses';

    protected $fillable = [
        'mulai', 'perkiraan', 'selesai', 'id_pembelian'
    ];

    public $timestamps = false;
}
