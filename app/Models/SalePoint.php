<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalePoint extends Model
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
        'address',
        'working_hours',
        'contact_person',
        'phone',
        'photo_1',
        'photo_2',
        'photo_3',
        'map_marker_lat',
        'map_marker_lng',
        'user_id'
    ];

    protected $table = 'sale_point';

    public function offers()
    {
        return $this->belongsToMany(Offer::class, 'sale_point_offer', 'sale_point_id', 'offer_id');
    }
}
