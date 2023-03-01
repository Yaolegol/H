<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogLevelOneSeeder extends Seeder
{
    public $data = [
        [
            'image' => 'public/catalog/levelOne/items/1/images/main/1.jpg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/baked-pork-decorated-with-arugula-leaves_6850619.htm#page=14&query=meat&position=12&from_view=search&track=sph">Изображение от timolina</a> на Freepik',
            'link' => 'meat',
            'order' => 1,
            'title' => 'Мясо, птица и колбасные изделия',
        ],
        [
            'image' => 'public/catalog/levelOne/items/2/images/main/1.jpg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/lemon-slices-and-salmon-arrangement_10883722.htm#query=fish&position=0&from_view=search&track=sph">Freepik</a>',
            'link' => 'fish',
            'order' => 1,
            'title' => 'Рыба и морепродукты',
        ],
        [
            'image' => 'public/catalog/levelOne/items/3/images/main/1.jpg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/milk-products_9078497.htm#page=2&query=milk%20cheese&position=17&from_view=search&track=ais">Изображение от Racool_studio</a> на Freepik',
            'link' => 'milk',
            'order' => 1,
            'title' => 'Молоко, сыр, творог',
        ],
        [
            'image' => 'public/catalog/levelOne/items/4/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'eggs',
            'order' => 1,
            'title' => 'Яйца',
        ],
        [
            'image' => 'public/catalog/levelOne/items/5/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'fruit',
            'order' => 1,
            'title' => 'Фрукты',
        ],
        [
            'image' => 'public/catalog/levelOne/items/6/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'vegetables',
            'order' => 1,
            'title' => 'Овощи',
        ],
        [
            'image' => 'public/catalog/levelOne/items/7/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'berry',
            'order' => 1,
            'title' => 'Ягода',
        ],
        [
            'image' => 'public/catalog/levelOne/items/8/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'mushrooms',
            'order' => 1,
            'title' => 'Грибы',
        ],
        [
            'image' => 'public/catalog/levelOne/items/9/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'bread',
            'order' => 1,
            'title' => 'Хлеб, выпечка и кондитерские изделия',
        ],
        [
            'image' => 'public/catalog/levelOne/items/10/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'tea',
            'order' => 1,
            'title' => 'Чай и травы',
        ],
        [
            'image' => 'public/catalog/levelOne/items/11/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'grocery',
            'order' => 1,
            'title' => 'Крупа, мука, соль, сахар, растительные масла',
        ],
        [
            'image' => 'public/catalog/levelOne/items/12/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'nuts',
            'order' => 1,
            'title' => 'Орехи',
        ],
        [
            'image' => 'public/catalog/levelOne/items/13/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'juice',
            'order' => 1,
            'title' => 'Вода, сок и безалкогольные напитки',
        ],
        [
            'image' => 'public/catalog/levelOne/items/14/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'preserves',
            'order' => 1,
            'title' => 'Консервы',
        ],
        [
            'image' => 'public/catalog/levelOne/items/15/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'flower',
            'order' => 1,
            'title' => 'Цветы',
        ],
        [
            'image' => 'public/catalog/levelOne/items/16/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'plants',
            'order' => 1,
            'title' => 'Растения и саженцы',
        ],
        [
            'image' => 'public/catalog/levelOne/items/17/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'plants',
            'order' => 1,
            'title' => 'Дрова, сено, удобрения',
        ],
        [
            'image' => 'public/catalog/levelOne/items/18/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'honey',
            'order' => 1,
            'title' => 'Мед и товары пчеловодства',
        ],
        [
            'image' => 'public/catalog/levelOne/items/19/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'tourism',
            'order' => 1,
            'title' => 'Эко туризм',
        ],
        [
            'image' => 'public/catalog/levelOne/items/20/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'fur',
            'order' => 1,
            'title' => 'Одежда и меховые изделия',
        ],
        [
            'image' => 'public/catalog/levelOne/items/21/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'wood',
            'order' => 1,
            'title' => 'Изделия из древесины',
        ],
        [
            'image' => 'public/catalog/levelOne/items/22/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'metal',
            'order' => 1,
            'title' => 'Изделия из металла',
        ],
        [
            'image' => 'public/catalog/levelOne/items/23/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'electronics',
            'order' => 1,
            'title' => 'Робототехника, электроника и транспортные средства',
        ],
        [
            'image' => 'public/catalog/levelOne/items/0/images/main/1.jpg',
            'image_licence_link' => '',
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
