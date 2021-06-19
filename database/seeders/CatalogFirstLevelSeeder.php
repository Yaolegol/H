<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogFirstLevelSeeder extends Seeder
{
    public $data = [
        [
            'link' => '/meat',
            'title' => 'Мясная продукция',
        ],
        [
            'link' => '/milk',
            'title' => 'Молочная продукция',
        ],
        [
            'link' => '/eggs',
            'title' => 'Яйца',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data as $dataItem) {
            DB::table('catalog_first_level')->insert($dataItem);
        }
    }
}
