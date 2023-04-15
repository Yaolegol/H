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
        'approved_error_message',
        'title',
        'inn',
        'legal_address',
        'real_address',
        'email',
        'phone',
        'certificate_1',
        'certificate_2',
        'certificate_3',
        'certificate_4',
        'certificate_5',
        'photo_1',
        'photo_2',
        'photo_3',
        'user_id',
        'is_removed',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'user_id',
    ];
}
