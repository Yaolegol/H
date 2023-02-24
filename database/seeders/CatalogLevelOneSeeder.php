<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogLevelOneSeeder extends Seeder
{
    public $data = [
        [
            'image' => 'public/catalog/levelOne/items/1/images/main/1.jpg',
            'link' => 'meat',
            'order' => 1,
            'title' => 'Мясная продукция',
        ],
        [
            'image' => 'public/catalog/levelOne/items/2/images/main/1.jpg',
            'link' => 'milk',
            'order' => 1,
            'title' => 'Молочная продукция',
        ],
        [
            'image' => 'public/catalog/levelOne/items/3/images/main/1.jpg',
            'link' => 'eggs',
            'order' => 1,
            'title' => 'Яйца',
        ],
        [
            'image' => 'public/catalog/levelOne/items/0/images/main/1.jpg',
            'link' => 'other',
            'order' => 999,
            'title' => 'Другое',
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
            DB::table('catalog_level_one')->insert($dataItem);
        }
    }
}
