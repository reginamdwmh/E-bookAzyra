<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPemesananOnline extends Model
{
    use HasFactory;
    protected $table ='transaksi_pemesanan_online';
    protected $primaryKey = 'id_online';
    protected $fillable = ['kode_pemesanan','keterangan_pemesanan','jumlah','biaya_admin','ongkir','komisi','total'];
}
