<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $table = 'organization';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'inn',
        'legal_address',
        'real_address',
        'email',
        'phone',
        'user_id',
    ];

    public function salePoints()
    {
        return $this->hasMany(SalePoint::class);
    }
}
