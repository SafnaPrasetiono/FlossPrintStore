<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelianproduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelianproduks', function (Blueprint $table) {
            $table->id('id_pembelian_produk');
            $table->string('namaproduk', 255);
            $table->string('jenisproduk', 50);
            $table->string('ukuranproduk', 5);
            $table->integer('beratproduk');
            $table->integer('jumlah');
            $table->integer('hargaproduk');
            $table->integer('totalharga');
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
        Schema::dropIfExists('pembelianproduks');
    }
}
