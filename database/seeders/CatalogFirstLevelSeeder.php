<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogFirstLevelSeeder extends Seeder
{
    public $data = [
        [
            'title' => 'Мясная продукция',
            'link' => '/meat'
        ],
        [
            'title' => 'Молочная продукция',
            'link' => '/milk'
        ],
        [
            'title' => 'Яйца',
            'link' => '/eggs'
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
