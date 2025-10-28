<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class produto extends Model
{
    protected $table = "produtos";
    use HasFactory;
    
    public function user(){
            return $this->belongsTo(User::class,'id_user');
    }
    public function categoria(){
            return $this->belongsTo(categoria::class,'id_categoria');
    }
}
 