<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $primaryKey = 'cart_id';


    protected $fillable = [
        'user_id',
        'product_code',
        'quantity',
        'viewed_by_user',

    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'product_code', 'product_code');
    }

    public function cart_product_customizations()
    {
        return $this->hasMany(CartProductCustom::class, 'cart_id', 'cart_id');
    }

    public function getTotalPrice()
    {
        return $this->quantity * $this->product->product_price->price;
    }

    public function scopeWithStock($query)
    {
        return $query->with('product');
    }
}
