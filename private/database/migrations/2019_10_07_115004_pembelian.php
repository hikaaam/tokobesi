<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pembelian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nota',80);
            $table->string('nama',80);
            $table->string('kategori',50);
            $table->string('suplier',50);
            $table->unsignedInteger('harga_beli')->length(30);
            $table->unsignedInteger('harga_jual')->length(30);
            $table->unsignedInteger('jumlah')->length(30);
            $table->timestamps();
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
