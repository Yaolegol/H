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
        'visible_email',
        'password',
        'phone',
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
        'visible_email_verified_at',
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
            ])
            ->with(
            [
                'catalogLevelTwo',
                'catalogLevelTwo.catalogLevelOne',
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
        return $this->hasMany(Offer::class);
    }

    public function organizations()
    {
        return $this->hasMany(Organization::class);
    }

    public function salePoints()
    {
        return $this->hasMany(SalePoint::class);
    }
}
