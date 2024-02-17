<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProductCustom extends Model
{
    use HasFactory;

    protected $table = 'cart_product_customizations';
    protected $primaryKey = 'cart_product_customization_id';


    protected $fillable = [
        'cart_id',
        'product_code',
        'size',
        'milk',
        'flavor',
        'topping',
        'add_in',
    ];
}
