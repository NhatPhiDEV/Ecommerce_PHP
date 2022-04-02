<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class discount extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
         'discountName', 
         'discountCondition', 
         'discountExpiry',
         'Count', 
         'Feature', 
         'discountCode', 

    
    ];

    protected $primaryKey = 'discountID';
    protected $table = 'discount';
}
