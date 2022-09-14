<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiPemesananOnline extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_pemesanan_online', function (Blueprint $table) {
            $table->increments('id_online');
            $table->string('kode_pemesanan');
            $table->string('keterangan_pemesanan');
            $table->integer('jumlah');
            $table->integer('biaya_admin')->nullable;
            $table->integer('ongkir')->nullable;
            $table->integer('komisi')->nullable;
            $table->integer('total');
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
        Schema::dropIfExists('transaksi_pemesanan_online');
    }
}
