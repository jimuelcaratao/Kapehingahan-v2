<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';
    protected $primaryKey = 'order_item_id';

    protected $fillable = [
        'order_no',
        'product_code',
        'quantity',
        'price',
    ];

    public function product_customizations()
    {
        return $this->hasMany(ProductCustom::class, 'order_item_id', 'order_item_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'product_code', 'product_code');
    }
}
