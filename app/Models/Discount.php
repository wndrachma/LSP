<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_discount_id',
        'product_id',
        'start_date',
        'end_date',
        'percentage'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
