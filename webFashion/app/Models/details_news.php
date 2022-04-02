<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class details_news extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
         'DetailsTittle', 
         'DetailsImage	',
         'Description',
         'NewsID', 
    ];

    protected $primaryKey = 'ID';
    protected $table = 'detail_news';
}
