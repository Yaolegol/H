<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogLevelOneSeeder extends Seeder
{
    public $data = [
        [
            'image' => 'public/catalog/levelOne/items/meat/images/main/1.jpg',
            'image_licence_link' => '<a style="text-decoration: underline" target="_blank" rel="noopener noreferrer" href="https://ru.freepik.com/free-photo/baked-pork-decorated-with-arugula-leaves_6850619.htm#page=14&query=meat&position=12&from_view=search&track=sph">Изображение от timolina</a> на Freepik',
            'link' => 'meat',
            'order' => 1,
            'title' => 'Мясо, птица и колбасные изделия',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/1.jpg',
            'image_licence_link' => 'Изображение от <a style="text-decoration: underline" target="_blank" rel="noopener noreferrer" href="https://ru.freepik.com/free-photo/lemon-slices-and-salmon-arrangement_10883722.htm#query=fish&position=0&from_view=search&track=sph">Freepik</a>',
            'link' => 'fish',
            'order' => 2,
            'title' => 'Рыба и морепродукты',
        ],
        [
            'image' => 'public/catalog/levelOne/items/milk/images/main/1.jpg',
            'image_licence_link' => '<a style="text-decoration: underline" target="_blank" rel="noopener noreferrer" href="https://ru.freepik.com/free-photo/milk-products_9078497.htm#page=2&query=milk%20cheese&position=17&from_view=search&track=ais">Изображение от Racool_studio</a> на Freepik',
            'link' => 'milk',
            'order' => 3,
            'title' => 'Молоко, сыр, творог',
        ],
        [
            'image' => 'public/catalog/levelOne/items/eggs/images/main/1.jpg',
            'image_licence_link' => 'Изображение от <a style="text-decoration: underline" target="_blank" rel="noopener noreferrer" href="https://ru.freepik.com/free-photo/top-view-of-easter-eggs-in-bird-nests-and-feathers_12295170.htm#page=2&query=eggs&position=11&from_view=search&track=sph">Freepik</a>',
            'link' => 'eggs',
            'order' => 4,
            'title' => 'Яйца',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fruit/images/main/1.jpg',
            'image_licence_link' => '<a style="text-decoration: underline" target="_blank" rel="noopener noreferrer" href="https://ru.freepik.com/free-photo/fruits-and-berries-platter-vegan-cuisine_10606159.htm#page=3&query=fruits&position=5&from_view=search&track=sph?log-in=google">Изображение от azerbaijan_stockers</a> на Freepik',
            'link' => 'fruit',
            'order' => 5,
            'title' => 'Фрукты',
        ],
        [
            'image' => 'public/catalog/levelOne/items/vegetables/images/main/1.jpg',
            'image_licence_link' => '<a style="text-decoration: underline" target="_blank" rel="noopener noreferrer" href="https://ru.freepik.com/free-photo/front-view-vegetable_15718656.htm#query=vegetables&position=42&from_view=search&track=sph">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'vegetables',
            'order' => 6,
            'title' => 'Овощи',
        ],
        [
            'image' => 'public/catalog/levelOne/items/berry/images/main/1.jpg',
            'image_licence_link' => '<a style="text-decoration: underline" target="_blank" rel="noopener noreferrer" href="https://ru.freepik.com/free-photo/mixed-berries_904532.htm#page=3&query=fruits&position=19&from_view=search&track=sph">Изображение от jcstudio</a> на Freepik',
            'link' => 'berry',
            'order' => 7,
            'title' => 'Ягода',
        ],
        [
            'image' => 'public/catalog/levelOne/items/bread/images/main/1.jpg',
            'image_licence_link' => '<a style="text-decoration: underline" target="_blank" rel="noopener noreferrer" href="https://ru.freepik.com/free-photo/white-bread-set-on-the-table_7219671.htm#page=2&query=bread&position=40&from_view=search&track=sph">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'bread',
            'order' => 8,
            'title' => 'Хлеб, пирожки и булочки',
        ],
        [
            'image' => 'public/catalog/levelOne/items/confectionery/images/main/1.jpg',
            'image_licence_link' => '<a style="text-decoration: underline" target="_blank" rel="noopener noreferrer" href="https://ru.freepik.com/free-photo/homemade-blackberry-cheesecake-and-matcha-tea-on-a-cake-stand-on-a-white-background-berry-dessert-copy-space_23789689.htm#query=Confectionery&position=40&from_view=search&track=sph">Изображение от user14908974</a> на Freepik',
            'link' => 'confectionery',
            'order' => 9,
            'title' => 'Кондитерские изделия',
        ],
        [
            'image' => 'public/catalog/levelOne/items/tea/images/main/1.jpg',
            'image_licence_link' => '<a style="text-decoration: underline" target="_blank" rel="noopener noreferrer" href="https://ru.freepik.com/free-photo/black-tea-with-dry-tea-in-a-teapot-on-wooden-surface-side-view_8756014.htm#query=tea&position=2&from_view=search&track=sph">Изображение от 8photo</a> на Freepik',
            'link' => 'tea',
            'order' => 10,
            'title' => 'Чай и травы',
        ],
        [
            'image' => 'public/catalog/levelOne/items/honey/images/main/1.jpg',
            'image_licence_link' => '<a style="text-decoration: underline" target="_blank" rel="noopener noreferrer" href="https://ru.freepik.com/free-photo/fresh-honeycombs_6948836.htm#query=honey&position=3&from_view=search&track=sph">Изображение от Racool_studio</a> на Freepik',
            'link' => 'honey',
            'order' => 11,
            'title' => 'Мед и товары пчеловодства',
        ],
        [
            'image' => 'public/catalog/levelOne/items/grocery/images/main/1.jpg',
            'image_licence_link' => 'Изображение от <a style="text-decoration: underline" target="_blank" rel="noopener noreferrer" href="https://ru.freepik.com/free-photo/supermarket-banner-concept-with-ingredients_26830769.htm#query=grocery&position=42&from_view=search&track=sph">Freepik</a>',
            'link' => 'grocery',
            'order' => 12,
            'title' => 'Бакалея',
        ],
        [
            'image' => 'public/catalog/levelOne/items/nuts/images/main/1.jpg',
            'image_licence_link' => '<a style="text-decoration: underline" target="_blank" rel="noopener noreferrer" href="https://ru.freepik.com/free-photo/some-of-assorted-nuts-and-dried-fruits-with-pecan-pistachios-almond-peanut-cashew-pine-nuts-top-view_7481238.htm#&position=0&from_view=undefined">Изображение от 8photo</a> на Freepik',
            'link' => 'nuts',
            'order' => 13,
            'title' => 'Орехи, изюм и сухофрукты',
        ],
        [
            'image' => 'public/catalog/levelOne/items/preserves/images/main/1.jpg',
            'image_licence_link' => 'Изображение от <a style="text-decoration: underline" target="_blank" rel="noopener noreferrer" href="https://ru.freepik.com/free-photo/food-preservation-with-jars_21933170.htm#query=preserves&position=0&from_view=search&track=sph?sign-up=google">Freepik</a>',
            'link' => 'preserves',
            'order' => 14,
            'title' => 'Консервы',
        ],
        [
            'image' => 'public/catalog/levelOne/items/mushrooms/images/main/1.jpg',
            'image_licence_link' => '<a style="text-decoration: underline" target="_blank" rel="noopener noreferrer" href="https://ru.freepik.com/free-photo/mushroom_30806373.htm#page=2&query=mashroom&position=40&from_view=search&track=sph">Изображение от kamchatka</a> на Freepik',
            'link' => 'mushrooms',
            'order' => 15,
            'title' => 'Грибы',
        ],
        [
            'image' => 'public/catalog/levelOne/items/juice/images/main/1.jpg',
            'image_licence_link' => 'Изображение от <a style="text-decoration: underline" target="_blank" rel="noopener noreferrer" href="https://ru.freepik.com/free-photo/drink-bottles-in-wooden-crate_11463498.htm#page=6&query=juice&position=12&from_view=search&track=sph">Freepik</a>',
            'link' => 'juice',
            'order' => 16,
            'title' => 'Вода, сок и квас',
        ],
        [
            'image' => 'public/catalog/levelOne/items/flower/images/main/1.jpg',
            'image_licence_link' => 'Изображение от <a style="text-decoration: underline" target="_blank" rel="noopener noreferrer" href="https://ru.freepik.com/free-photo/flat-lay-of-beautifully-bloomed-colorful-rose-flowers_15365302.htm#page=17&query=flowers&position=45&from_view=search&track=sph">Freepik</a>',
            'link' => 'flower',
            'order' => 17,
            'title' => 'Цветы',
        ],
        [
            'image' => 'public/catalog/levelOne/items/seeds/images/main/1.jpg',
            'image_licence_link' => 'Изображение от <a style="text-decoration: underline" target="_blank" rel="noopener noreferrer" href="https://ru.freepik.com/free-photo/high-angle-of-woman-spreading-seeds-on-soil-in-pot_12391887.htm#query=%D0%A1%D0%B5%D0%BC%D0%B5%D0%BD%D0%B0&position=45&from_view=search&track=sph">Freepik</a>',
            'link' => 'seeds',
            'order' => 18,
            'title' => 'Семена',
        ],
        [
            'image' => 'public/catalog/levelOne/items/seedlings/images/main/1.jpg',
            'image_licence_link' => 'Изображение от <a style="text-decoration: underline" target="_blank" rel="noopener noreferrer" href="https://ru.freepik.com/free-photo/top-view-gardening-tools-and-flower-pot_13560868.htm#query=%D0%A1%D0%B0%D0%B6%D0%B5%D0%BD%D1%86%D1%8B&position=0&from_view=search&track=sph">Freepik</a>',
            'link' => 'seedlings',
            'order' => 19,
            'title' => 'Саженцы',
        ],
        [
            'image' => 'public/catalog/levelOne/items/plants/images/main/1.jpg',
            'image_licence_link' => '<a style="text-decoration: underline" target="_blank" rel="noopener noreferrer" href="https://ru.freepik.com/free-photo/green-houseplant-background-for-plant-lovers_17599271.htm#page=2&query=plants&position=13&from_view=search&track=sph">Изображение от rawpixel.com</a> на Freepik',
            'link' => 'plants',
            'order' => 20,
            'title' => 'Растения',
        ],
        [
            'image' => 'public/catalog/levelOne/items/farming/images/main/1.jpg',
            'image_licence_link' => '<a style="text-decoration: underline" target="_blank" rel="noopener noreferrer" href="https://ru.freepik.com/free-photo/cow-resting-on-the-grass-covered-hills_13995437.htm#page=5&query=%D0%96%D0%B8%D0%B2%D0%BE%D1%82%D0%BD%D0%BE%D0%B2%D0%BE%D0%B4%D1%81%D1%82%D0%B2%D0%BE&position=49&from_view=search&track=sph">Изображение от wirestock</a> на Freepik',
            'link' => 'farming',
            'order' => 22,
            'title' => 'Животноводство',
        ],
        [
            'image' => 'public/catalog/levelOne/items/feed/images/main/1.jpg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/still-life-pets-food-assortment_14603300.htm#query=animals%20feed&position=33&from_view=search&track=ais">Freepik</a>',
            'link' => 'feed',
            'order' => 23,
            'title' => 'Корма для животных',
        ],
        [
            'image' => 'public/catalog/levelOne/items/hay/images/main/1.jpg',
            'image_licence_link' => '<a style="text-decoration: underline" target="_blank" rel="noopener noreferrer" href="https://ru.freepik.com/free-photo/harvested-grain-field-captured-on-a-sunny-day-with-some-clouds_17244521.htm#query=village&position=45&from_view=search&track=sph">Изображение от wirestock</a> на Freepik',
            'link' => 'hay',
            'order' => 26,
            'title' => 'Древесина',
        ],
        [
            'image' => 'public/catalog/levelOne/items/tourism/images/main/1.jpg',
            'image_licence_link' => '<a style="text-decoration: underline" target="_blank" rel="noopener noreferrer" href="https://ru.freepik.com/free-photo/large-green-rice-field-with-green-rice-plants-in-rows_12909734.htm#page=13&query=village&position=0&from_view=search&track=sph">Изображение от wirestock</a> на Freepik',
            'link' => 'tourism',
            'order' => 27,
            'title' => 'Эко туризм',
        ],
        [
            'image' => 'public/catalog/levelOne/items/clothes/images/main/1.jpg',
            'image_licence_link' => '<a style="text-decoration: underline" target="_blank" rel="noopener noreferrer" href="https://ru.freepik.com/free-photo/serious-scandinavian-woman-with-pigtails-looks-calmly-at-front-dressed-in-warm-winter-clothing-poses-over-blue-wall_13758642.htm#query=caucasian%20clothing&position=0&from_view=search&track=ais">Изображение от wayhomestudio</a> на Freepik',
            'link' => 'clothes',
            'order' => 28,
            'title' => 'Одежда и сувениры',
        ],
        [
            'image' => 'public/catalog/levelOne/items/seed/images/main/1.jpg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/growing-wheat-in-wind_1234214.htm#query=seed&position=5&from_view=search&track=sph">Изображение от montypeter</a> на Freepik',
            'link' => 'seed',
            'order' => 21,
            'title' => 'Зерно',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fertilizers/images/main/1.jpg',
            'image_licence_link' => 'Изображение от <a style="text-decoration: underline" target="_blank" rel="noopener noreferrer" href="https://ru.freepik.com/free-photo/compost-still-life-concept_17538508.htm#query=%D0%9D%D0%B0%D0%B2%D0%BE%D0%B7&position=0&from_view=search&track=sph">Freepik</a>',
            'link' => 'fertilizers',
            'order' => 25,
            'title' => 'Удобрения',
        ],
        [
            'image' => 'public/catalog/levelOne/items/furs/images/main/1.jpg',
            'image_licence_link' => 'Photo by <a href="https://unsplash.com/@myfunkypixel?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Vita Leonis</a> on <a href="https://unsplash.com/photos/jvn8gPiGEac?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>',
            'link' => 'furs',
            'order' => 24,
            'title' => 'Пушнина',
        ],
        [
            'id' => 999,
            'image' => 'public/catalog/levelOne/items/other/images/main/1.jpg',
            'image_licence_link' => 'Изображение от <a style="text-decoration: underline" target="_blank" rel="noopener noreferrer" href="https://ru.freepik.com/free-photo/glasses-on-market-in-morocco_4246624.htm#page=2&query=%D0%9D%D0%B0%D1%86%D0%B8%D0%BE%D0%BD%D0%B0%D0%BB%D1%8C%D0%BD%D1%8B%D0%B5%20%D1%81%D1%83%D0%B2%D0%B5%D0%BD%D0%B8%D1%80%D1%8B&position=6&from_view=search&track=ais">Freepik</a>',
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
