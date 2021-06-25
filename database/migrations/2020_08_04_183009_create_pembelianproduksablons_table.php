<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelianproduksablonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelianproduksablons', function (Blueprint $table) {
            $table->id('id_pembelian_sablon');
            $table->string('jenisproduk', 255);
            $table->string('tipesablon', 255);
            $table->integer('jumlah');
            $table->string('ukuran', 100);
            $table->integer('panjang');
            $table->integer('lebar');
            $table->integer('berat');
            $table->integer('harga');
            $table->integer('totalharga');
            $table->string('foto_depan', 255);
            $table->string('foto_belakang', 255);
            $table->integer('id_pembelian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembelianproduksablons');
    }
}
