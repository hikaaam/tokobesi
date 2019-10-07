<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pembeliancache extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembeliancache', function (Blueprint $table) {
            $table->bigIncrements('id');
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
