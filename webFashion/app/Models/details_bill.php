<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class details_bill extends Model
{
    public $timestamps = false;
    protected $fillable = [
         'DetailID', 
         'ProductID', 
         'BillID',
         'ProductCount', 
         'Note', 
    ];

    protected $primaryKey = 'DetailID';
    protected $table = 'product_detail';

    public function product_bill(){
        return $this->belongsTo('App\Models\Product','ProductID');
    }
}
