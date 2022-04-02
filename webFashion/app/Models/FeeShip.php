<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeShip extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
         'Fee_MaTP', 
         'Fee_MaQH', 
         'Fee_XaID',
         'Fee_Ship',
    ];

    protected $primaryKey = 'FeeID';
    protected $table = 'feeship';
}