<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterDataMakananModel extends Model
{
    use HasFactory;
    protected $table ='makanan';
    protected $primaryKey = 'id_makanan';
    protected $fillable = ['nama_kategori','id_alat','nama_makanan','harga','image'];

}
