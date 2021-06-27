<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $table = 'seller';

    public function products()
    {
        return $this->morphToMany(Product::class, 'seller-product');
    }
}
