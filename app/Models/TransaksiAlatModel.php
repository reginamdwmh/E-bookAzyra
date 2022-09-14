<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiAlatModel extends Model
{
    use HasFactory;
    protected $table ='transaksi_alat';
    protected $primaryKey = 'id_transaksialat';
    protected $fillable = ['nama_alat','harga','jumlah','total'];
}
