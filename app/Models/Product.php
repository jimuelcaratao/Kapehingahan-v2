<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $primaryKey = 'product_code';

    protected $fillable = [
        // 'sku',
        'product_code',
        'product_name',
        'category_name',
        'brand_name',
        'description',
        'stock',
        'default_photo',
        'price',
    ];

    public function product_photos()
    {
        return $this->hasOne(ProductPhoto::class, 'product_code', 'product_code');
    }


    public function product_custom()
    {
        return $this->hasOne(ProductCustom::class, 'product_code', 'product_code');
    }
}
