<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogSeeder extends Seeder
{
    public $data = [
        [
            'image' => 'https://picsum.photos/200/300',
            'level' => 1,
            'link' => 'meat',
            'order' => 1,
            'title' => 'Мясная продукция',
        ],
        [
            'image' => 'https://picsum.photos/200/300',
            'level' => 1,
            'link' => 'milk',
            'order' => 2,
            'title' => 'Молочная продукция',
        ],
        [
            'image' => 'https://picsum.photos/200/300',
            'level' => 1,
            'link' => 'eggs',
            'order' => 3,
            'title' => 'Яйца',
        ],
        [
            'image' => 'https://picsum.photos/200/300',
            'level' => 2,
            'link' => 'beef',
            'order' => 1,
            'title' => 'Говядина',
        ],
        [
            'image' => 'https://picsum.photos/200/300',
            'level' => 2,
            'link' => 'chicken',
            'order' => 2,
            'title' => 'Курица',
        ],
        [
            'image' => 'https://picsum.photos/200/300',
            'level' => 2,
            'link' => 'milk',
            'order' => 1,
            'title' => 'Молоко',
        ],
        [
            'image' => 'https://picsum.photos/200/300',
            'level' => 2,
            'link' => 'kefir',
            'order' => 3,
            'title' => 'Кефир',
        ],
        [
            'image' => 'https://picsum.photos/200/300',
            'level' => 2,
            'link' => 'chicken-eggs',
            'order' => 1,
            'title' => 'Куринные яйца',
        ],
        [
            'image' => 'https://picsum.photos/200/300',
            'level' => 2,
            'link' => 'quail',
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
            DB::table('catalog')->insert($dataItem);
        }
    }
}
