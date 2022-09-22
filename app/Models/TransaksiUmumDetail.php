<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiUmumDetail extends Model
{
    use HasFactory;
    protected $table ='transaksi_umum_detail';
    protected $primaryKey = 'id_transaksi_umum_detail';
    protected $fillable = ['id_umum','keterangan_pemesanan','jumlah_pemesanan'];

    public function get_transaksiumum(){  
        return $this->belongsTo(TransaksiUmum::class, 'id_umum');  
    }  
}
