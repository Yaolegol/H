<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogSecondLevelSeeder extends Seeder
{
    public $data = [
        [
            'catalog_first_level_id' => '1',
            'link' => '/beef',
            'title' => 'Говядина',
        ],
        [
            'catalog_first_level_id' => '1',
            'link' => '/chicken',
            'title' => 'Курица',
        ],
        [
            'catalog_first_level_id' => '2',
            'link' => '/milk',
            'title' => 'Молоко',
        ],
        [
            'catalog_first_level_id' => '2',
            'link' => '/kefir',
            'title' => 'Кефир',
        ],
        [
            'catalog_first_level_id' => '3',
            'link' => '/chicken',
            'title' => 'Куринные яйца',
        ],
        [
            'catalog_first_level_id' => '3',
            'link' => '/quail',
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
