<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ulasanproduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // membuat table ulasan produk
        Schema::create('ulasanproduk', function (Blueprint $table) {
            $table->id('idulasan');
            $table->text('pesan');
            $table->text('balasan');
            $table->date('tanggal')->nullable();
            $table->integer('idproduk');
            $table->integer('iduser');
            $table->char('notif', 12);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
