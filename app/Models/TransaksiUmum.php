<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiUmum extends Model
{
    use HasFactory;
    protected $table ='transaksi_umum';
    protected $primaryKey = 'id_umum';
    protected $fillable = ['nama_makanan','harga','jumlah_penjualan','total'];


    public function get_transaksiumumdetail(){  
        return $this->hasMany(TransaksiUmumDetail::class, 'id_umum');  
    } 

    // public function transaksidetailumum()
    // {
    //     return $this->belongsToMany(MasterDataMakananModel::class)->withPivot('
    //     keterangan_pemmesanan','jumlah_pemesanan');
    // }

    // public function pemesanans()
    // {
    //     return $this->hasMany(MasterDataPemesananModel::class);
    // }

}