<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengirimanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id('id_pengiriman');
            $table->string('provinsi', 255);
            $table->string('kota', 255);
            $table->text('alamat');
            $table->string('kodepos', 10);
            $table->string('expedisi', 50);
            $table->string('layanan', 20);
            $table->integer('harga');
            $table->string('resi', 25)->nullable();
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
        Schema::dropIfExists('pengiriman');
    }
}
