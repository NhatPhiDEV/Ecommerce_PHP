<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product_sale extends Model
{
    public $timestamps = false;
    protected $fillable = [
         'Sale', 
         'SaleName', 
    ];

    protected $primaryKey = 'Sale';
    protected $table = 'product_sale';
}
