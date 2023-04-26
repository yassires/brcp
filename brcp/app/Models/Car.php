<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{

     protected $fillable = [
          'name',
          'brand_id',
          'category_id',
          'color',
          'price_rent',
          'price_sell',
          'image',
          'available',
          'sell_rent'
     ];

     public function Brand()
     {
          return $this->belongsTo(Brand::class);
     }
     public function Category()
     {
          return $this->belongsTo(Category::class);
     }

}
