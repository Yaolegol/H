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
        'approved_error_message',
        'title',
        'description',
        'address',
        'working_hours',
        'contact_person',
        'phone',
        'order',
        'price',
        'delivery',
        'delivery_description',
        'photo_1',
        'photo_2',
        'photo_3',
        'price_description',
        'map_marker_lat',
        'map_marker_lng',
        'is_active',
        'is_approved',
        'user_id',
        'organization_id',
        'catalog_level_one_id',
        'catalog_level_two_id',
        'is_removed',
    ];

    protected $table = 'offer';

    public function catalogLevelOne()
    {
        return $this->belongsTo(CatalogLevelOne::class, 'catalog_level_one_id');
    }

    public function catalogLevelTwo()
    {
        return $this->belongsToMany(CatalogLevelTwo::class, 'catalog_level_two_offer', 'offer_id', 'catalog_level_two_id');
    }

    public function measure()
    {
        return $this->belongsTo(Measure::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class)->where([
            'is_approved' => true,
            'is_removed' => false,
        ]);
    }

    public function rating()
    {
        return $this->belongsToMany(RatingForOffer::class, 'offer_rating_for_offer', 'offer_id', 'rating_for_offer_id');
    }

    public function salePoints()
    {
        return $this->belongsToMany(SalePoint::class, 'sale_point_offer', 'offer_id', 'sale_point_id')->where([
            'is_approved' => true,
            'is_removed' => false,
        ]);
    }

    public function usersFavorites()
    {
        return $this->belongsToMany(User::class, 'users_favorites_offers', 'offer_id', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
