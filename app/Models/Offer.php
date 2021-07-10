<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $table = 'offer';

    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }

    public function measure()
    {
        return $this->belongsTo(Measure::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
