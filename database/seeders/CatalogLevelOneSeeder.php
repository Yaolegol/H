<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogLevelOneSeeder extends Seeder
{
    public $data = [
        [
            'image' => 'https://picsum.photos/200/300',
            'link' => 'meat',
            'order' => 1,
            'title' => 'Мясная продукция',
        ],
        [
            'image' => 'https://picsum.photos/200/300',
            'link' => 'milk',
            'order' => 2,
            'title' => 'Молочная продукция',
        ],
        [
            'image' => 'https://picsum.photos/200/300',
            'link' => 'eggs',
            'order' => 3,
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
            DB::table('catalog_level_one')->insert($dataItem);
        }
    }
}
