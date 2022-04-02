<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
         'Name_Wards', 
         'Type', 
         'MaQH',
    ];

    protected $primaryKey = 'XaID';
    protected $table = 'tbl_xaphuongthitran';
}