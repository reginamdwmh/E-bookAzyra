<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterDataBahanModel extends Model
{
    use HasFactory;
    protected $table ='bahan';
    protected $primaryKey = 'id_bahan';
    protected $fillable = ['nama_bahan','harga'];
}
