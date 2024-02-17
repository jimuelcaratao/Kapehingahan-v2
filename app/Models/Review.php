<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'product_code',
        'stars',
        'body',
        'viewed_by_user',

    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
