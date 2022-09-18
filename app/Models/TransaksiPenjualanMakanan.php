<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualanMakanan extends Model
{
    use HasFactory;
    protected $table ='transaksi_penjualan_makanan';
    protected $primaryKey = 'id_penjualan';
    protected $fillable = ['nama_makanan','harga','jumlah','diskon','total'];
    
}
