<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar',
        'name',
        'description',
        'phone',
        'password',
        'is_approved',
        'is_changed',
        'is_removed',
        'phone_before_removed',
        'approved_error_message',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'city_id',
        'created_at',
        'is_admin',
        'lang_id',
        'password',
        'remember_token',
        'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    public function favoritesOffers()
    {
        return $this->belongsToMany(Offer::class, 'users_favorites_offers', 'user_id', 'offer_id')
            ->where([
                'is_approved' => true,
                'is_removed' => false,
            ])
            ->with(
            [
                'catalogLevelOne',
                'catalogLevelTwo',
                'measure',
                'organization',
                'salePoints',
                'user',
            ]
        );
    }

    public function getUserData() {
        return $this->toArray();
    }

    public function offers()
    {
        return $this->hasMany(Offer::class)->where([
            ['is_approved', 1],
            ['is_removed', false]
        ]);
    }

    public function organizations()
    {
        return $this->hasMany(Organization::class)->where([
            ['is_approved', 1],
            ['is_removed', false]
        ]);
    }

    public function salePoints()
    {
        return $this->hasMany(SalePoint::class)->where([
            ['is_approved', 1],
            ['is_removed', false]
        ]);
    }
}
