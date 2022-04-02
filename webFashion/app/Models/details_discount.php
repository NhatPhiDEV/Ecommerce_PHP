<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class details_discount extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
         'discountID', 
         'CustomerID', 
         'Status', 
    
    ];

    protected $primaryKey = 'ID';
    protected $table = 'discount_detail';

    public function customer_discount(){
        return $this->belongsTo('App\Models\Customer','CustomerID');
    }
    public function discount_code(){
        return $this->belongsTo('App\Models\discount','discountID');
    }

}
