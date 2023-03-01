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
            'image' => 'public/catalog/levelOne/items/1/images/main/1.jpg',
            'link' => 'meat',
            'order' => 1,
            'title' => 'Рыба и морепродукты',
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
            'image' => 'public/catalog/levelOne/items/3/images/main/1.jpg',
            'link' => 'fruit',
            'order' => 1,
            'title' => 'Фрукты',
        ],
        [
            'image' => 'public/catalog/levelOne/items/3/images/main/1.jpg',
            'link' => 'vegetables',
            'order' => 1,
            'title' => 'Овощи',
        ],
        [
            'image' => 'public/catalog/levelOne/items/7/images/main/1.jpg',
            'link' => 'berry',
            'order' => 1,
            'title' => 'Ягода',
        ],
        [
            'image' => 'public/catalog/levelOne/items/7/images/main/1.jpg',
            'link' => 'mushrooms',
            'order' => 1,
            'title' => 'Грибы',
        ],
        [
            'image' => 'public/catalog/levelOne/items/4/images/main/1.jpg',
            'link' => 'bread',
            'order' => 1,
            'title' => 'Хлеб, выпечка и кондитерские изделия',
        ],
        [
            'image' => 'public/catalog/levelOne/items/5/images/main/1.jpg',
            'link' => 'tea',
            'order' => 1,
            'title' => 'Чай и травы',
        ],
        [
            'image' => 'public/catalog/levelOne/items/5/images/main/1.jpg',
            'link' => 'grocery',
            'order' => 1,
            'title' => 'Крупа, мука, соль, сахар, растительные масла',
        ],
        [
            'image' => 'public/catalog/levelOne/items/5/images/main/1.jpg',
            'link' => 'nuts',
            'order' => 1,
            'title' => 'Орехи',
        ],
        [
            'image' => 'public/catalog/levelOne/items/6/images/main/1.jpg',
            'link' => 'juice',
            'order' => 1,
            'title' => 'Вода, сок и безалкогольные напитки',
        ],
        [
            'image' => 'public/catalog/levelOne/items/5/images/main/1.jpg',
            'link' => 'preserves',
            'order' => 1,
            'title' => 'Консервы',
        ],
        [
            'image' => 'public/catalog/levelOne/items/7/images/main/1.jpg',
            'link' => 'flower',
            'order' => 1,
            'title' => 'Цветы',
        ],
        [
            'image' => 'public/catalog/levelOne/items/7/images/main/1.jpg',
            'link' => 'plants',
            'order' => 1,
            'title' => 'Растения и саженцы',
        ],
        [
            'image' => 'public/catalog/levelOne/items/7/images/main/1.jpg',
            'link' => 'plants',
            'order' => 1,
            'title' => 'Дрова, сено, удобрения',
        ],
        [
            'image' => 'public/catalog/levelOne/items/7/images/main/1.jpg',
            'link' => 'honey',
            'order' => 1,
            'title' => 'Мед и товары пчеловодства',
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
