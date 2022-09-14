<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiPenjualanMakananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_penjualan_makanan', function (Blueprint $table) {
            $table->increments('id_penjualan');
            $table->string('nama_makanan');
            $table->string('harga');
            $table->string('jumlah');
            $table->string('diskon')->nullable;
            $table->string('total');
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
        Schema::dropIfExists('transaksi_penjualan_makanan');
    }
}
