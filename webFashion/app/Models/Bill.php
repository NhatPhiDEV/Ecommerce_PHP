<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public $timestamps = false;
    protected $fillable = [
         'DateCreated', 
         'CustomerID', 
         'TotalMoney', 
         'Status', 
         'ReceiverAdress', 
         'ReceiverName',
         'ReceiverPhone',
         'PayID',
         'discountID',
    ];

    protected $primaryKey = 'BillID';
    protected $table = 'bill';

    public function customer_bill(){
        return $this->belongsTo('App\Models\Customer','CustomerID');
    }
    public function discount_bill(){
        return $this->belongsTo('App\Models\discount','discountID');
    }
    public function pay_bill(){
        return $this->belongsTo('App\Models\method_pay','PayID');
    }


}
