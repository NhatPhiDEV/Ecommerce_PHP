<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
         'SlideName', 
         'SlideImage', 
         'Status',
    ];

    protected $primaryKey = 'ID';
    protected $table = 'slide';
}