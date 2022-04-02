<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product_type extends Model
{
    public $timestamps = false;
    protected $fillable = [
         'Type', 
         'TypeName', 
         'Status' 
    ];

    protected $primaryKey = 'Type';
    protected $table = 'product_type';
}
