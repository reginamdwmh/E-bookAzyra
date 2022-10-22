<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class UsersModel extends Model
{
    use HasFactory;

    protected $table ='users';
    protected $primaryKey = 'id';
    protected $fillable = ['name','email','password','role'];
}