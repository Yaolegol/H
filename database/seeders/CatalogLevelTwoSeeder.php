<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogLevelTwoSeeder extends Seeder
{
    public $data = [
        [
            'image' => 'public/catalog/levelTwo/items/1/images/main/1.jpg',
            'link' => 'beef',
            'order' => 1,
            'catalog_level_one_id' => 1,
            'title' => 'Говядина',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/2/images/main/1.jpg',
            'link' => 'chicken',
            'order' => 2,
            'catalog_level_one_id' => 1,
            'title' => 'Курица',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/3/images/main/1.jpg',
            'link' => 'milk',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Молоко',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/4/images/main/1.jpg',
            'link' => 'kefir',
            'order' => 3,
            'catalog_level_one_id' => 2,
            'title' => 'Кефир',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/5/images/main/1.jpg',
            'link' => 'chicken-eggs',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Куринные яйца',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => 'quail',
            'order' => 2,
            'catalog_level_one_id' => 3,
            'title' => 'Перепелинные яйца',
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
            DB::table('catalog_level_two')->insert($dataItem);
        }
    }
}
