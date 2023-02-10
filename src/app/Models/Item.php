<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public $guarded = ['id', 'created_at',];

    public function cart() {
    // cartモデルのデータを引っ張てくる
    return $this->hasMany('App\cart','cart_id');
    }
    
}
