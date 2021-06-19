<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogSecondLevel extends Model
{
    use HasFactory;

    protected $table = 'catalog_second_level';

    public function catalogFirstLevel()
    {
        return $this->belongsTo(CatalogFirstLevel::class);
    }
}
