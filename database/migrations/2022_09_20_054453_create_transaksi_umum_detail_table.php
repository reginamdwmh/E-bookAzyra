<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiUmumDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_umum_detail', function (Blueprint $table) {
            // $table->bigIncrements('id_transaksi_umum_detail');
            // // $table->integer('id_umum');
            // $table->foreign('id_umum')->references('id_umum')->on('transaksi_umum');
            // $table->string('keterangan_pemesanan');
            // $table->integer('jumlah_pemesanan');
            // $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_umum_detail');
    }
}
