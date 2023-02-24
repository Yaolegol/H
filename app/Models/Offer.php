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
        'title',
        'description',
        'address',
        'phone',
        'order',
        'price',
        'photo_1',
        'photo_2',
        'photo_3',
        'price_description',
        'map_marker_lat',
        'map_marker_lng',
        'is_active',
        'user_id',
        'organization_id',
        'catalog_level_two_id',
        'measure_id',
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

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function salePoints()
    {
        return $this->belongsToMany(SalePoint::class, 'sale_point_offer', 'offer_id', 'sale_point_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
