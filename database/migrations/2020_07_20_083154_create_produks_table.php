<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id('id_produk');
            $table->string('namaproduk');
            $table->integer('harga');
            $table->integer('stok');
            $table->integer('terjual')->nullable();
            $table->string('jenis', 20);
            $table->string('ukuran', 5);
            $table->integer('panjang')->nullable();
            $table->integer('lebar')->nullable();
            $table->integer('berat');
            $table->string('samplefoto', 255)->nullable();
            $table->date('tanggal');
            $table->text('deskripsi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
}
