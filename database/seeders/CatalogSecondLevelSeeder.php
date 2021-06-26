<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogSecondLevelSeeder extends Seeder
{
    public $data = [
        [
            'catalog_first_level_id' => '1',
            'image' => 'https://picsum.photos/200/300',
            'link' => '/beef',
            'order' => 1,
            'title' => 'Говядина',
        ],
        [
            'catalog_first_level_id' => '1',
            'image' => 'https://picsum.photos/200/300',
            'link' => '/chicken',
            'order' => 2,
            'title' => 'Курица',
        ],
        [
            'catalog_first_level_id' => '2',
            'image' => 'https://picsum.photos/200/300',
            'link' => '/milk',
            'order' => 1,
            'title' => 'Молоко',
        ],
        [
            'catalog_first_level_id' => '2',
            'image' => 'https://picsum.photos/200/300',
            'link' => '/kefir',
            'order' => 3,
            'title' => 'Кефир',
        ],
        [
            'catalog_first_level_id' => '3',
            'image' => 'https://picsum.photos/200/300',
            'link' => '/chicken',
            'order' => 1,
            'title' => 'Куринные яйца',
        ],
        [
            'catalog_first_level_id' => '3',
            'image' => 'https://picsum.photos/200/300',
            'link' => '/quail',
            'order' => 2,
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
            DB::table('catalog_second_level')->insert($dataItem);
        }
    }
}
