<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
         'Name_City', 
         'Type', 
    ];

    protected $primaryKey = 'MaTP';
    protected $table = 'tbl_tinhthanhpho';
}