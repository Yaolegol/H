<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferRating extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'is_approved',
        'is_removed',
        'approved_error_message',
        'comment',
        'value',
        'user_id',
        'offer_id',
    ];

    protected $table = 'offer_rating';

    public function userData()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
