<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiUmum extends Model
{
    use HasFactory;
    protected $table ='transaksi_umum';
    protected $primaryKey = 'id_umum';
    protected $fillable = ['nama_makanan','harga','jumlah_penjualan','keterangan_pemesanan','jumlah_pemesanan','total'];
}
