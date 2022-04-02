<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
         'Name_Province', 
         'Type', 
         'MaTP',
    ];

    protected $primaryKey = 'MaQH';
    protected $table = 'tbl_quanhuyen';
}