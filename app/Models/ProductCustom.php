<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCustom extends Model
{
    use HasFactory;

    protected $table = 'product_customizations';
    protected $primaryKey = 'product_customization_id';


    protected $fillable = [
        'order_item_id',
        'product_code',
        'size',
        'milk',
        'flavor',
        'topping',
        'add_in',
    ];
}
