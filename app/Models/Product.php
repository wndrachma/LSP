<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_category_id',
        'product_name',
        'description',
        'price',
        'stok_quantity',
        'image1_url',
        'image2_url',
        'image3_url',
        'image4_url',
        'image5_url'
    ];

    public function fproducts(){
        return $this->belongsTo(Product::class, 'product_category_id', 'id');
    }
    
    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

    public function getDiscountedPrice()
    {
        if ($this->discounts->isNotEmpty()) {
            $discount = $this->discounts->first();
            return $this->price - ($this->price * $discount->percentage / 100);
        }
        return $this->price;
    }
}
