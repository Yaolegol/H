<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogLevelTwoSeeder extends Seeder
{
    public $data = [
        // Мясная продукция
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
            'order' => 1,
            'catalog_level_one_id' => 1,
            'title' => 'Курица',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/2/images/main/1.jpg',
            'link' => 'turkey',
            'order' => 1,
            'catalog_level_one_id' => 1,
            'title' => 'Индейка',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/2/images/main/1.jpg',
            'link' => 'pork',
            'order' => 1,
            'catalog_level_one_id' => 1,
            'title' => 'Свинина',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/2/images/main/1.jpg',
            'link' => 'sheep',
            'order' => 1,
            'catalog_level_one_id' => 1,
            'title' => 'Баранина',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/2/images/main/1.jpg',
            'link' => 'calf',
            'order' => 1,
            'catalog_level_one_id' => 1,
            'title' => 'Телятина',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/2/images/main/1.jpg',
            'link' => 'rabbit',
            'order' => 1,
            'catalog_level_one_id' => 1,
            'title' => 'Крольчатина',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/2/images/main/1.jpg',
            'link' => 'goat',
            'order' => 1,
            'catalog_level_one_id' => 1,
            'title' => 'Козлятина',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/2/images/main/1.jpg',
            'link' => 'bear',
            'order' => 1,
            'catalog_level_one_id' => 1,
            'title' => 'Медвежатина',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/2/images/main/1.jpg',
            'link' => 'deer',
            'order' => 1,
            'catalog_level_one_id' => 1,
            'title' => 'Оленина',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/2/images/main/1.jpg',
            'link' => 'moose',
            'order' => 1,
            'catalog_level_one_id' => 1,
            'title' => 'Лосятина',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/0/images/main/1.jpg',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 1,
            'title' => 'Остальное',
        ],











        //   Рыба













        // Молочная продукция
        [
            'image' => 'public/catalog/levelTwo/items/3/images/main/1.jpg',
            'link' => 'milk',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Молоко',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/4/images/main/1.jpg',
            'link' => 'milk_сream',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Сливки',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/4/images/main/1.jpg',
            'link' => 'kefir',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Кефир',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/4/images/main/1.jpg',
            'link' => 'butter',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Масло',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/4/images/main/1.jpg',
            'link' => 'margarine',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Маргарин',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/4/images/main/1.jpg',
            'link' => 'сottage_cheese',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Творог',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/4/images/main/1.jpg',
            'link' => 'sour_cream',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Сметана',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/4/images/main/1.jpg',
            'link' => 'ryazhenka',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Ряженка',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/4/images/main/1.jpg',
            'link' => 'milkshake',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Молочные коктели',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/4/images/main/1.jpg',
            'link' => 'yogurt',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Йогурт',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/4/images/main/1.jpg',
            'link' => 'curds',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Творожные сырки',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/4/images/main/1.jpg',
            'link' => 'pudding',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Пудинг',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/4/images/main/1.jpg',
            'link' => 'сondensed_milk',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Сгущенное молоко',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/4/images/main/1.jpg',
            'link' => 'cheese',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Сыр',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/0/images/main/1.jpg',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 3,
            'title' => 'Остальное',
        ],









        // Яйца
        [
            'image' => 'public/catalog/levelTwo/items/5/images/main/1.jpg',
            'link' => 'chicken-eggs',
            'order' => 1,
            'catalog_level_one_id' => 4,
            'title' => 'Куринные яйца',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => 'quail',
            'order' => 1,
            'catalog_level_one_id' => 4,
            'title' => 'Перепелинные яйца',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/0/images/main/1.jpg',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 4,
            'title' => 'Остальное',
        ],




        // Фрукты
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => 'apple',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Яблоки',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => 'pears',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Груши',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Мандарины',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Апельсины',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Бананы',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Манго',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Виноград',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Слива',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Хурма',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Айва',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Киви',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Грейпфрут',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Гранат',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Лимон',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Персики',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Кокос',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Авокадо',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Хурма',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Арбуз',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Дыня',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/0/images/main/1.jpg',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 5,
            'title' => 'Остальное',
        ],









        // Овощи
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Картофель',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Помидоры',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Огурцы',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Капуста',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Лук репчатый',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Лук пырей',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Салат',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Петрушка',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Укроп',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Баклажан',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Тыква',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Кабачок',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Перец',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Свекла',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Морковь',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Чеснок',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Редиска',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Редька',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Кукуруза',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/0/images/main/1.jpg',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 6,
            'title' => 'Остальное',
        ],








        // Ягода
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Голубика',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Клубника',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Черемуха',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Черноплодная рябина',
        ],[
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Рябина',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Жимолость',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Смородина',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Крыжовник',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Земляника',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Облепиха',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Клюква',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Брусника',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Ежевика',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Боярышник',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Инжир',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Черешня',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Вишня',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Шелковица',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Ирга',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Личи',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/0/images/main/1.jpg',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 7,
            'title' => 'Остальное',
        ],






        // Хлеб
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 8,
            'title' => 'Хлеб пшеничный',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 8,
            'title' => 'Хлеб ржаной',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 8,
            'title' => 'Лаваш, лепешки',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 8,
            'title' => 'Пирожки сладкие',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 8,
            'title' => 'Пироги сладкие',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 8,
            'title' => 'Пирожки сытные',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 8,
            'title' => 'Пироги сытные',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 8,
            'title' => 'Булочки',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 8,
            'title' => 'Батон',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 8,
            'title' => 'Хлебцы',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 8,
            'title' => 'Сушки и сухарики',
        ],








        // Кондитерские изделия
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 9,
            'title' => 'Торты',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 9,
            'title' => 'Пирожные',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 9,
            'title' => 'Кексы',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 9,
            'title' => 'Пряники',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 9,
            'title' => 'Конфеты',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 9,
            'title' => 'Карамель',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 9,
            'title' => 'Зефир',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 9,
            'title' => 'Шоколад',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 9,
            'title' => 'Пастила',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 9,
            'title' => 'Восточные сладости',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 9,
            'title' => 'Печенье',
        ],[
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 9,
            'title' => 'Круассаны',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 9,
            'title' => 'Вафли',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/6/images/main/1.jpg',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 9,
            'title' => 'Бисквитные изделия',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/0/images/main/1.jpg',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 9,
            'title' => 'Остальное',
        ],









        //
        [
            'image' => 'public/catalog/levelTwo/items/0/images/main/1.jpg',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 4,
            'title' => 'Остальное',
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
