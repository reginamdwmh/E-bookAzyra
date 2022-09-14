<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterDataPemesananModel extends Model
{
    use HasFactory;
    protected $table ='pemesanan';
    protected $primaryKey = 'id_pemesanan';
    protected $fillable = ['keterangan_pemesanan'];
}