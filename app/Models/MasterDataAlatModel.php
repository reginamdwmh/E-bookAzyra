<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterDataAlatModel extends Model
{
    use HasFactory;
    protected $table ='alat';
    protected $primaryKey = 'id_alat';
    protected $fillable = ['nama_alat','harga'];
}
