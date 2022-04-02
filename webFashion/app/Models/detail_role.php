<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_role extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'idAdmin', 
        'idRole',
        'Status',

   ];
   public function role(){
    return $this->belongsTo('App\Models\role','idRole');
}
   protected $primaryKey = 'id';
   protected $table = 'detail_role';
}
