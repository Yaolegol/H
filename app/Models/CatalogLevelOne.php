<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogLevelOne extends Model
{
    use HasFactory;

    protected $table = 'catalog_level_one';

    public function catalogLevelTwo()
    {
        return $this->hasMany(CatalogLevelTwo::class);
    }
}
