<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_rating extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
         'ProductID', 
         'Rate',
         'CustomerID',  
         'Status',  
         'Comment',  

    ];

    protected $primaryKey = 'id';
    protected $table = 'rating_product';

    public function rating_product(){
        return $this->belongsTo('App\Models\Product','ProductID');
    }

    public function rating_customer(){
        return $this->belongsTo('App\Models\Customer','CustomerID');
    }
}
