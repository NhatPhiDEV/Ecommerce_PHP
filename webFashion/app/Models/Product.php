<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'ProductID',
         'ProductName', 
         'ProductPrice',
         'Size',
         'Type',
         'Brand',
         'Sale',
         'Note',
         'ProductCreatedDate',
         'ProductCount',
         'ProductImage',
         'Status',
         'DefaultPrice',
         'Action',

    ];

    protected $primaryKey = 'ProductID';
    protected $table = 'product';

    public function scopeSearch($query){
        if(request('key')){
            $key = request('key');
            $query = $query->where('ProductName','like','%'.$key.'%');
            
        }

        if (request('Type')){
            $query = $query->where('Type',request('Type'));
        }

        return $query;
    }



    public function product_Type(){
        return $this->belongsTo('App\Models\product_type','Type');
    }
    public function product_Brand(){
        return $this->belongsTo('App\Models\product_brand','Brand');
    }
    public function product_Size(){
        return $this->belongsTo('App\Models\product_size','Size');
    }
    public function product_Sale(){
        return $this->belongsTo('App\Models\product_sale','Sale');
    }
    
}
