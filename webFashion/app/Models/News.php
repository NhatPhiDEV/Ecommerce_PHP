<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
         'TittleNews', 
         'NewsImage', 
         'Description', 
         'Action',  
    ];

    protected $primaryKey = 'NewsID';
    protected $table = 'news';
}
