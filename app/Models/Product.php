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
        'status',
        'stock',
        'stock_measurement',
        'default_photo',
        'is_customizable',
        'price',
        'viewers',
    ];



    public function product_reviews()
    {
        return $this->hasMany(Review::class, 'product_code', 'product_code')->latest();
    }

    public function product_custom()
    {
        return $this->hasOne(ProductCustom::class, 'product_code', 'product_code');
    }

    public function scopeSearchFilter($q)
    {
        if (!empty(request()->search)) {
            $q->Where('product_code', 'LIKE', '%' .  request()->search  .  '%')
                ->OrWhere('product_name', 'LIKE', '%' .  request()->search  .  '%');
        }

        return $q;
    }

    public function scopeCategoryFilter($q)
    {
        if (request()->search_col != null) {
            $q->Where('category_name', 'LIKE', '%' .  request()->search_col  .  '%');
        }
        return $q;
    }
}
