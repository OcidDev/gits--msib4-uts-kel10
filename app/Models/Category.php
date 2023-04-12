<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table='Category';
    protected $guarded=['id'];
    public function produk(){
        return $this->belongsTo(produk::class,'id_Category','id');
    }
}
