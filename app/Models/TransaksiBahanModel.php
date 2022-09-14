<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiBahanModel extends Model
{
    use HasFactory;
    protected $table ='transaksi_bahan';
    protected $primaryKey = 'id_transaksibahan';
    protected $fillable = ['nama_bahan','harga','jumlah','total'];
}
