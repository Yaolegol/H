<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'catalog_level_one_id',
        'catalog_level_two_id',
        'title',
        'description',
        'address',
        'phone',
        'price',
    ];

    protected $table = 'offer';

    public function catalogLevelTwo()
    {
        return $this->belongsTo(CatalogLevelTwo::class);
    }

    public function measure()
    {
        return $this->belongsTo(Measure::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
