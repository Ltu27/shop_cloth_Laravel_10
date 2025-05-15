<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'volume_ml',
        'price_per_ml',
        'price_total',
        'production_date',
        'stock_quantity',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
