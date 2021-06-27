<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public $data = [
        [
            'catalog_id' => 1,
            'image' => 'https://picsum.photos/200/300',
            'order' => 1,
            'title' => '1 test product - beef',
        ],
        [
            'catalog_id' => 2,
            'image' => 'https://picsum.photos/200/300',
            'order' => 1,
            'title' => '2 test product - chicken',
        ],
        [
            'catalog_id' => 3,
            'image' => 'https://picsum.photos/200/300',
            'order' => 1,
            'title' => '3 test product - milk',
        ],
        [
            'catalog_id' => 4,
            'image' => 'https://picsum.photos/200/300',
            'order' => 1,
            'title' => '4 test product - kefir',
        ],
        [
            'catalog_id' => 5,
            'image' => 'https://picsum.photos/200/300',
            'order' => 1,
            'title' => '5 test product - куринные яйца',
        ],
        [
            'catalog_id' => 6,
            'image' => 'https://picsum.photos/200/300',
            'order' => 1,
            'title' => '6 test product - перепелинные яйца',
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
            DB::table('product')->insert($dataItem);
        }
    }
}
