<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class method_pay extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
         'PayName', 
         'Status', 
    ];

    protected $primaryKey = 'PayID';
    protected $table = 'method_pay';

 
}
