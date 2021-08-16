<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalePoint extends Model
{
    use HasFactory;

    protected $table = 'sale_point';

//    public function catalog()
//    {
//        return $this->belongsTo(Catalog::class, 'seller-catalog');
//    }
}
