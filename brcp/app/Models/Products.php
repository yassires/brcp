<?php

namespace App\Models;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'description',
        'quantity',
        'image',
   ];

   public function cart(){
    return $this->hasMany(Cart::class);
}
}
