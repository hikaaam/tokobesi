<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Penjualan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nota',80);
            $table->string('produk',50);
            $table->string('pelanggan',50);
            $table->unsignedInteger('jumlah')->length(30);
            $table->unsignedInteger('harga')->length(30);
            $table->unsignedInteger('bayar')->length(30)->nullable();
            $table->unsignedInteger('status')->default(0);
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
