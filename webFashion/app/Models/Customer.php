<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;
    protected $fillable = [
         'CustomerName', 'CustomerSex','CustomerAdress','CustomerEmail', 'CustomerPhone','UserName','PassWord'
    ];

    protected $primaryKey = 'CustomerID';
    protected $table = 'customer';
}
