<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product_brand extends Model
{
    public $timestamps = false;
    protected $fillable = [
         'Brand', 
         'BrandName', 
    ];

    protected $primaryKey = 'Brand';
    protected $table = 'product_brand';
}
