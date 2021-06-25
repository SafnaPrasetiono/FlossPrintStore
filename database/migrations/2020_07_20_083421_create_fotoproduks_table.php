<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoproduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotoproduks', function (Blueprint $table) {
            $table->id('id_fotoproduk');
            $table->string('namafoto')->nullable();
            $table->string('ukuran')->nullable();
            $table->string('lokasi')->nullable();
            $table->integer('id_produk')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fotoproduks');
    }
}
