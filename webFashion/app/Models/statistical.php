<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statistical extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
         'order_date', 
         'profit', 
         'quantity',
         'total_order',
         'sales',

    ];

    protected $primaryKey = 'id_statistical ';
    protected $table = 'statistical';
}