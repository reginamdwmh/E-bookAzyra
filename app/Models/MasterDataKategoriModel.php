<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterDataKategoriModel extends Model
{
    use HasFactory;
    protected $table ='kategori';
    protected $primaryKey = 'id_kategori';
    protected $fillable = ['kode_kategori','nama_kategori','keterangan_kategori'];
}
