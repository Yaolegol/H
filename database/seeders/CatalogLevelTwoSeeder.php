<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogLevelTwoSeeder extends Seeder
{
    public $data = [
        // Мясная продукция
        [
            'image' => 'public/catalog/levelOne/items/meat/images/main/sub/beef/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/beautiful-cow-on-green-grass-with-blue-sky_11244791.htm#query=cow&position=14&from_view=search&track=sph">Изображение от vwalakte</a> на Freepik',
            'link' => 'beef',
            'order' => 1,
            'catalog_level_one_id' => 1,
            'title' => 'Говядина',
        ],
        [
            'image' => 'public/catalog/levelOne/items/meat/images/main/sub/chicken/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/closeup-shot-of-a-white-hen-walking-in-a-field_10759817.htm#query=%D0%9A%D1%83%D1%80%D0%B8%D1%86%D0%B0&position=27&from_view=search&track=sph">Изображение от wirestock</a> на Freepik',
            'link' => 'chicken',
            'order' => 1,
            'catalog_level_one_id' => 1,
            'title' => 'Курица',
        ],
        [
            'image' => 'public/catalog/levelOne/items/meat/images/main/sub/turkey/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/side-view-turkey-outdoors_8775118.htm#page=2&query=%D0%98%D0%BD%D0%B4%D0%B5%D0%B9%D0%BA%D0%B0&position=30&from_view=search&track=sph">Freepik</a>',
            'link' => 'turkey',
            'order' => 1,
            'catalog_level_one_id' => 1,
            'title' => 'Индейка',
        ],
        [
            'image' => 'public/catalog/levelOne/items/meat/images/main/sub/pork/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/closeup-shot-of-three-domesticated-pigs_17244243.htm#query=pig&position=37&from_view=search&track=sph">Изображение от wirestock</a> на Freepik',
            'link' => 'pork',
            'order' => 1,
            'catalog_level_one_id' => 1,
            'title' => 'Свинина',
        ],
        [
            'image' => 'public/catalog/levelOne/items/meat/images/main/sub/sheep/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/head-of-a-white-sheep_15672323.htm#query=sheep&position=4&from_view=search&track=sph">Изображение от wirestock</a> на Freepik',
            'link' => 'sheep',
            'order' => 1,
            'catalog_level_one_id' => 1,
            'title' => 'Баранина',
        ],
        [
            'image' => 'public/catalog/levelOne/items/meat/images/main/sub/rabbit/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/portrait-of-a-cute-fluffy-gray-rabbit-with-ears-on-a-natural-green_9604087.htm#page=2&query=rabbit&position=47&from_view=search&track=sph">Изображение от pereslavtseva</a> на Freepik',
            'link' => 'rabbit',
            'order' => 1,
            'catalog_level_one_id' => 1,
            'title' => 'Крольчатина',
        ],
        [
            'image' => 'public/catalog/levelOne/items/meat/images/main/sub/goat/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/brown-and-white-mother-and-baby-goats-inside-a-barn_12045833.htm#query=goat&position=1&from_view=search&track=sph">Изображение от wirestock</a> на Freepik',
            'link' => 'goat',
            'order' => 1,
            'catalog_level_one_id' => 1,
            'title' => 'Козлятина',
        ],
        [
            'image' => 'public/catalog/levelOne/items/meat/images/main/sub/horse/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/horse-alezan-brown-ride-mane_1102300.htm#query=horse&position=42&from_view=search&track=sph">Изображение от senivpetro</a> на Freepik',
            'link' => 'horse',
            'order' => 1,
            'catalog_level_one_id' => 1,
            'title' => 'Конина',
        ],
        [
            'image' => 'public/catalog/levelOne/items/meat/images/main/sub/bear/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/close-wild-big-brown-bear-near-a-forest-lake_11011847.htm#query=bear&position=29&from_view=search&track=sph">Изображение от byrdyak</a> на Freepik',
            'link' => 'bear',
            'order' => 1,
            'catalog_level_one_id' => 1,
            'title' => 'Медвежатина',
        ],
        [
            'image' => 'public/catalog/levelOne/items/meat/images/main/sub/deer/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/red-deer-in-the-nature-habitat-during-the-deer-rut-european-wildlife_16755911.htm#query=deer&position=34&from_view=search&track=sph">Изображение от vladimircech</a> на Freepik',
            'link' => 'deer',
            'order' => 1,
            'catalog_level_one_id' => 1,
            'title' => 'Оленина',
        ],
        [
            'image' => 'public/catalog/levelOne/items/meat/images/main/sub/moose/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/beautiful-shot-of-a-moose-or-elk-on-a-road-near-the-woods_14376060.htm#page=3&query=moose&position=45&from_view=search&track=sph">Изображение от wirestock</a> на Freepik',
            'link' => 'moose',
            'order' => 1,
            'catalog_level_one_id' => 1,
            'title' => 'Лосятина',
        ],
        [
            'image' => 'public/catalog/levelOne/items/meat/images/main/sub/other/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/wild-boar-in-the-nature-habitat-dangerous-animal-in-the-forest-czech-republic-nature-sus-scrofa_16206151.htm#query=%D0%BA%D0%B0%D0%B1%D0%B0%D0%BD&position=2&from_view=search&track=sph">Изображение от vladimircech</a> на Freepik',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 1,
            'title' => 'Остальное',
        ],











        //   Рыба
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/trout/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/two-raw-seabass-with-spices_7121185.htm#page=2&query=%D1%84%D0%BE%D1%80%D0%B5%D0%BB%D1%8C&position=0&from_view=search&track=sph">Изображение от timolina</a> на Freepik',
            'link' => 'trout',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Форель',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/pollock/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/composition-with-frozen-fish-on-the-table_14278035.htm#query=%D0%9C%D0%B8%D0%BD%D1%82%D0%B0%D0%B9&position=0&from_view=search&track=sph">Freepik</a>',
            'link' => 'pollock',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Минтай',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/salmon_fish/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/slices-of-raw-red-salmon_9659716.htm#query=%D0%A1%D0%B5%D0%BC%D0%B3%D0%B0&position=3&from_view=search&track=sph">Freepik</a>',
            'link' => 'salmon_fish',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Семга',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/pike/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/close-up-of-fresh-pike-fish_3105527.htm#query=%D0%A9%D1%83%D0%BA%D0%B0&position=27&from_view=search&track=sph">Freepik</a>',
            'link' => 'pike',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Щука',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/crucian_carp/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/fresh-raw-crucian-on-a-wooden-with-herbs_6963638.htm#query=%D0%9A%D0%B0%D1%80%D0%B0%D1%81%D1%8C&position=2&from_view=search&track=sph">Изображение от timolina</a> на Freepik',
            'link' => 'crucian_carp',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Карась',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/flounder/1.jpeg',
            'image_licence_link' => 'Photo by <a href="https://unsplash.com/@brian_yuri?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Brian Yurasits</a> on <a href="https://unsplash.com/photos/KhTywORJC74?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>',
            'link' => 'flounder',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Камбала',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/cod/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/bottom-view-fish-fry-fried-eggplants-onion-peppers-on-wood-board-spices-in-small-bowls-fork-and-knife-tomatoes-oil-bottle-mint-dill-on-dark-background_16607684.htm#query=%D0%A2%D1%80%D0%B5%D1%81%D0%BA%D0%B0&position=30&from_view=search&track=sph">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'cod',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Треска',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/carp/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/fried-fish-carp-and-fresh-vegetable-salad-flat-lay-top-view_7688790.htm#page=2&query=%D0%9A%D0%B0%D1%80%D0%BF&position=35&from_view=search&track=sph">Изображение от timolina</a> на Freepik',
            'link' => 'carp',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Карп',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/pink_salmon/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/front-view-of-fresh-cut-raw-fishes-green-on-dark-color-tray-spices-kumquats-oil-bottle-on-blue-black-mix-colors-table_13150272.htm#query=%D0%93%D0%BE%D1%80%D0%B1%D1%83%D1%88%D0%B0&position=10&from_view=search&track=sph">Изображение от mdjaff</a> на Freepik',
            'link' => 'pink_salmon',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Горбуша',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/sardine/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/closeup-shot-of-delicious-typical-spanish-espetos-of-sardines_30221988.htm#query=%D0%A1%D0%B0%D1%80%D0%B4%D0%B8%D0%BD%D0%B0&position=24&from_view=search&track=sph">Изображение от wirestock</a> на Freepik',
            'link' => 'sardine',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Сардина',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/herring/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/front-view-fresh-sliced-fish-with-fresh-tomatoes-on-the-dark-seafood-color-photo-salad-meat-snack_14781385.htm#query=%D0%A1%D0%B5%D0%BB%D1%8C%D0%B4%D1%8C&position=14&from_view=search&track=sph">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'herring',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Сельдь',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/mackerel/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/smoked-mackerel-and-fresh-salad_6933333.htm#query=%D0%A1%D0%BA%D1%83%D0%BC%D0%B1%D1%80%D0%B8%D1%8F&position=17&from_view=search&track=sph">Изображение от timolina</a> на Freepik',
            'link' => 'mackerel',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Скумбрия',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/tuna/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/japanese-traditional-salad-with-pieces-of-medium-rare-grilled-ahi-tuna-and-sesame-with-fresh-vegetable-on-a-bowl_7535413.htm#query=tuna&position=23&from_view=search&track=sph">Изображение от timolina</a> на Freepik',
            'link' => 'tuna',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Тунец',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/octopus/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/octopus-legs-with-lemon-mint-and-berries_5588265.htm#query=%D0%BE%D1%81%D1%8C%D0%BC%D0%B8%D0%BD%D0%BE%D0%B3&position=31&from_view=search&track=sph">Изображение от azerbaijan_stockers</a> на Freepik',
            'link' => 'octopus',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Осьминог',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/tilapia/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/fried-tilapia-with-chili-sauce-lemon-salad-and-garlic-on-a-plate-on-a-white-wooden-table_7370250.htm#query=tilapia&position=3&from_view=search&track=sph">Изображение от jcomp</a> на Freepik',
            'link' => 'tilapia',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Тилапия',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/pangasius/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/barramundi-or-pangasius-fish-and-meat-steak_1144652.htm#query=Pangasius&position=3&from_view=search&track=sph">Изображение от mrsiraphol</a> на Freepik',
            'link' => 'pangasius',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Пангасиус',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/shrimp/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/fried-shrimps-with-herbs-close-up-view_9130505.htm#page=2&query=shrimp&position=7&from_view=search&track=sph">Изображение от devmaryna</a> на Freepik',
            'link' => 'shrimp',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Креветка',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/squid/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/fresh-octopus-or-squids-raw-on-wooden-board-with-ingredients_19561669.htm#query=%D0%9A%D0%B0%D0%BB%D1%8C%D0%BC%D0%B0%D1%80&position=24&from_view=search&track=sph?log-in=google">Изображение от dashu83</a> на Freepik',
            'link' => 'squid',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Кальмар',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/perch/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/raw-fish-composition-for-cooking_13819994.htm#query=%D0%9E%D0%BA%D1%83%D0%BD%D1%8C&position=41&from_view=search&track=sph">Freepik</a>',
            'link' => 'perch',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Окунь',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/crab/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/steamed-crabs_1167909.htm#query=%D0%9A%D1%80%D0%B0%D0%B1&position=10&from_view=search&track=sph">Изображение от xb100</a> на Freepik',
            'link' => 'crab',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Краб',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/crayfish/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/crayfish-red-boiled-crawfishes-on-table-in-rustic-style-closeup-lobster-closeup-border-desig-top-view_7698203.htm#page=3&query=%D1%80%D0%B0%D0%BA%20%D0%B5%D0%B4%D0%B0&position=40&from_view=search&track=ais">Изображение от timolina</a> на Freepik',
            'link' => 'crayfish',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Раки',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/lobster/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/lobster-thermidor-grilled-lobster-stuffed-with-cream-and-cheese-served-with-lemonboston-lobster-w_15763325.htm#query=%D0%BE%D0%BC%D0%B0%D1%80%20%D0%B5%D0%B4%D0%B0&position=8&from_view=search&track=ais">Изображение от dashu83</a> на Freepik',
            'link' => 'lobster',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Лобстер (омар)',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/keta/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/top-view-fresh-fish-with-lemon-slices-on-wooden-table-food-seafood-dish-ocean_14552275.htm#query=%D1%80%D1%8B%D0%B1%D0%B0%20%D0%9A%D0%B5%D1%82%D0%B0&position=38&from_view=search&track=ais">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'keta',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Кета',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/sea_bass/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/two-raw-seabass-with-spices_7121178.htm#query=%D1%81%D0%B8%D0%B1%D0%B0%D1%81&position=1&from_view=search&track=sph">Изображение от timolina</a> на Freepik',
            'link' => 'sea_bass',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Сибас',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/saira/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/a-plate-of-roasted-saury_13909353.htm#query=%D1%81%D0%B0%D0%B9%D1%80%D0%B0&position=0&from_view=search&track=sph">Изображение от dashu83</a> на Freepik',
            'link' => 'saira',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Сайра',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/sprat/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/round-scad-fish_1273057.htm#query=%D1%80%D1%8B%D0%B1%D0%B0%20%D0%BA%D0%B8%D0%BB%D1%8C%D0%BA%D0%B0&position=28&from_view=search&track=ais">Изображение от dashu83</a> на Freepik',
            'link' => 'sprat',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Килька',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/anchovy/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/top-view-of-raw-sprats-placed-on-ice-surrounded-with-fruit-slices_6317526.htm#query=%D1%80%D1%8B%D0%B1%D0%B0%20%D0%B0%D0%BD%D1%87%D0%BE%D1%83%D1%81%D1%8B&position=43&from_view=search&track=ais">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'anchovy',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Анчоусы',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/burbot/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/top-view-raw-fish-pepper-grinder-tomatoes-on-table_17235533.htm#query=%D0%BD%D0%B0%D0%BB%D0%B8%D0%BC%D1%80%D1%8B%D0%B1%D0%B0&position=25&from_view=search&track=ais">Изображение от mdjaff</a> на Freepik',
            'link' => 'burbot',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Налим',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/vobla/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/uncooked-seafood-fish-with-lemon-and-tomatoes_10595071.htm#page=3&query=%D1%80%D1%8B%D0%B1%D0%B0&position=4&from_view=search&track=sph">Freepik</a>',
            'link' => 'vobla',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Вобла',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/sturgeon/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/sturgeon-lavangi-with-walnuts-cheery-plum-onion-pomegranate-lettuce-side-view_7787001.htm#query=sturgeon&position=3&from_view=search&track=sph">Изображение от stockking</a> на Freepik',
            'link' => 'sturgeon',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Осетр, стерлядь, белуга',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/mussels/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/top-view-delicious-seafood-composition_13508916.htm#query=%D0%BC%D0%B8%D0%B4%D0%B8%D0%B8&position=32&from_view=search&track=sph">Freepik</a>',
            'link' => 'mussels',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Мидии',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/oysters/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/raw-oysters-with-lemon-and-ice_20988248.htm#query=%D0%A3%D1%81%D1%82%D1%80%D0%B8%D1%86%D1%8B&position=24&from_view=search&track=sph">Изображение от fabrikasimf</a> на Freepik',
            'link' => 'oysters',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Устрицы',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/bream/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/tasty-seabream-with-lemons-high-angle_26923062.htm#query=%D0%9B%D0%B5%D1%89&position=0&from_view=search&track=sph">Freepik</a>',
            'link' => 'bream',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Лещ',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/catfish/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/closeup-shot-of-a-tiger-shovelnose-catfish-swimming-in-the-aquarium_20712327.htm#query=%D1%81%D0%BE%D0%BC&position=3&from_view=search&track=sph">Изображение от wirestock</a> на Freepik',
            'link' => 'catfish',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Сом',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/zander/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/bottom-view-tasty-fish-fry-lemon-slices-cut-cherry-tomatoes-on-plate-dried-flower-branch-wooden-spoon-on-black-table_16608187.htm#query=%D0%A1%D1%83%D0%B4%D0%B0%D0%BA&position=1&from_view=search&track=sph">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'zander',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Судак',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/omul/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/top-view-fresh-fish-slices-with-lemon-on-dark-background-color-water-photo-meat-food-ocean-health-dinner-meal-seafood_23505127.htm#query=%D1%80%D1%8B%D0%B1%D0%B0&from_query=%D0%9E%D0%BC%D1%83%D0%BB%D1%8C&position=11&from_view=search&track=sph">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'omul',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Омуль',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/roach/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/a-wooden-plate-full-of-delicious-fish_11527542.htm#page=2&query=%D0%BC%D0%B5%D0%BB%D0%BA%D0%B0%D1%8F%20%D1%80%D1%8B%D0%B1%D0%B0&position=18&from_view=search&track=ais">Изображение от azerbaijan_stockers</a> на Freepik',
            'link' => 'roach',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Плотва',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/capelin/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/top-view-fish-and-tomato-arrangement_11214407.htm#page=2&query=%D0%BC%D0%B5%D0%BB%D0%BA%D0%B0%D1%8F%20%D1%80%D1%8B%D0%B1%D0%B0&position=44&from_view=search&track=ais">Freepik</a>',
            'link' => 'capelin',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Мойва',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/salmon/1.jpeg',
            'image_licence_link' => '',
            'link' => 'salmon',
            'order' => 1,
            'catalog_level_one_id' => 2,
            'title' => 'Лосось',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fish/images/main/sub/other/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/top-view-mix-of-fresh-fishes-on-ice_5567771.htm#page=2&query=%D0%9A%D0%B0%D1%80%D0%BF&position=22&from_view=search&track=sph">Freepik</a>',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 2,
            'title' => 'Остальное',
        ],












        // Молочная продукция
        [
            'image' => 'public/catalog/levelOne/items/milk/images/main/sub/milk/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/bottles-of-fresh-milk-with-american-cookies_5101858.htm#query=%D0%9C%D0%BE%D0%BB%D0%BE%D0%BA%D0%BE&position=5&from_view=search&track=sph">Freepik</a>',
            'link' => 'milk',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Молоко',
        ],
        [
            'image' => 'public/catalog/levelOne/items/milk/images/main/sub/milk_сream/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/top-view-sweet-pillow-cookies-on-white-desk-sweet-milk-breakfast_16945563.htm#query=%D0%A1%D0%BB%D0%B8%D0%B2%D0%BA%D0%B8&position=0&from_view=search&track=sph">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'milk_сream',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Сливки',
        ],
        [
            'image' => 'public/catalog/levelOne/items/milk/images/main/sub/kefir/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/fresh-milk-bottle-glass_5507988.htm#query=%D0%9C%D0%BE%D0%BB%D0%BE%D0%BA%D0%BE&position=29&from_view=search&track=sph">Изображение от jcomp</a> на Freepik',
            'link' => 'kefir',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Кефир',
        ],
        [
            'image' => 'public/catalog/levelOne/items/milk/images/main/sub/koumiss/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/top-view-of-whole-and-cut-tasty-pastries-on-blue-stripped-towel-and-spike-milk-in-a-glass-on-blue_17230747.htm#page=5&query=%D0%9C%D0%BE%D0%BB%D0%BE%D0%BA%D0%BE%20%D0%BB%D0%B5%D0%BF%D0%B5%D1%88%D0%BA%D0%B0&position=8&from_view=search&track=ais">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'koumiss',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Кумыс',
        ],
        [
            'image' => 'public/catalog/levelOne/items/milk/images/main/sub/butter/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/top-view-of-woman-hand-cutting-butter-with-knife-and-sliced-sandwich-bread-on-cutting-board-on-wooden-background_8330046.htm#page=2&query=butter&position=2&from_view=search&track=sph">Изображение от stockking</a> на Freepik',
            'link' => 'butter',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Масло',
        ],
        [
            'image' => 'public/catalog/levelOne/items/milk/images/main/sub/margarine/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-vector/yellow-stick-of-butter-on-the-cutting-board-margarine-or-spread-natural-dairy-product_2238423.htm#query=%D0%9C%D0%B0%D1%80%D0%B3%D0%B0%D1%80%D0%B8%D0%BD&position=35&from_view=search&track=sph">Изображение от vectorpocket</a> на Freepik',
            'link' => 'margarine',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Маргарин',
        ],
        [
            'image' => 'public/catalog/levelOne/items/milk/images/main/sub/cottage_cheese/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/delicious-close-up-dairy-product-with-spoon_5101996.htm#query=%D0%A2%D0%B2%D0%BE%D1%80%D0%BE%D0%B3&position=6&from_view=search&track=sph">Freepik</a>',
            'link' => 'cottage_cheese',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Творог',
        ],
        [
            'image' => 'public/catalog/levelOne/items/milk/images/main/sub/sour_cream/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/greek-yoghurt_8052420.htm#query=%D0%A1%D0%BC%D0%B5%D1%82%D0%B0%D0%BD%D0%B0&position=2&from_view=search&track=sph">Изображение от Racool_studio</a> на Freepik',
            'link' => 'sour_cream',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Сметана',
        ],
        [
            'image' => 'public/catalog/levelOne/items/milk/images/main/sub/ryazhenka/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/soy-milk-soy-food-and-beverage-products-food-nutrition-concept_10400245.htm#query=%D0%9C%D0%BE%D0%BB%D0%BE%D0%BA%D0%BE&position=46&from_view=search&track=sph">Изображение от jcomp</a> на Freepik',
            'link' => 'ryazhenka',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Ряженка',
        ],
        [
            'image' => 'public/catalog/levelOne/items/milk/images/main/sub/milkshake/1.jpeg',
            'image_licence_link' => '',
            'link' => 'milkshake',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Молочные коктели',
        ],
        [
            'image' => 'public/catalog/levelOne/items/milk/images/main/sub/yogurt/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/yogurt-with-chia-seed-and-berries-in-glasses_7498210.htm#query=%D0%99%D0%BE%D0%B3%D1%83%D1%80%D1%82&position=9&from_view=search&track=sph">Изображение от Racool_studio</a> на Freepik',
            'link' => 'yogurt',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Йогурт',
        ],
        [
            'image' => 'public/catalog/levelOne/items/milk/images/main/sub/curds/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/white-homemade-cheese_17109784.htm#query=%D0%A2%D0%B2%D0%BE%D1%80%D0%BE%D0%B6%D0%BD%D1%8B%D0%B5%20%D1%81%D1%8B%D1%80%D0%BA%D0%B8&position=13&from_view=search&track=ais">Изображение от azerbaijan_stockers</a> на Freepik',
            'link' => 'curds',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Творожные сырки',
        ],
        [
            'image' => 'public/catalog/levelOne/items/milk/images/main/sub/pudding/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/rice-pudding-with-syrup-and-berries_28007155.htm#query=%D0%9F%D1%83%D0%B4%D0%B8%D0%BD%D0%B3&position=14&from_view=search&track=sph">Изображение от fahrwasser</a> на Freepik',
            'link' => 'pudding',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Пудинг',
        ],
        [
            'image' => 'public/catalog/levelOne/items/milk/images/main/sub/condensed_milk/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/homemade-sweet-condensed-milk_10606309.htm#query=%D0%A1%D0%B3%D1%83%D1%89%D0%B5%D0%BD%D0%BD%D0%BE%D0%B5%20%D0%BC%D0%BE%D0%BB%D0%BE%D0%BA%D0%BE&position=18&from_view=search&track=ais">Изображение от azerbaijan_stockers</a> на Freepik',
            'link' => 'condensed_milk',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Сгущенное молоко',
        ],
        [
            'image' => 'public/catalog/levelOne/items/milk/images/main/sub/cheese/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/delicious-pieces-of-cheese_10323206.htm#query=%D0%A1%D1%8B%D1%80&position=0&from_view=search&track=sph">Изображение от Racool_studio</a> на Freepik',
            'link' => 'cheese',
            'order' => 1,
            'catalog_level_one_id' => 3,
            'title' => 'Сыр',
        ],
        [
            'image' => 'public/catalog/levelOne/items/milk/images/main/sub/other/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/variety-of-dairy-products-and-cookies_5101986.htm#query=%D0%9C%D0%BE%D0%BB%D0%BE%D1%87%D0%BD%D0%B0%D1%8F%20%D0%BF%D1%80%D0%BE%D0%B4%D1%83%D0%BA%D1%86%D0%B8%D1%8F&position=6&from_view=search&track=ais">Freepik</a>',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 3,
            'title' => 'Остальное',
        ],









        // Яйца
        [
            'image' => 'public/catalog/levelOne/items/eggs/images/main/sub/chicken-eggs/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/white-eggs-on-piece-of-burlap_11818672.htm#query=Eggs&position=10&from_view=search&track=sph">Изображение от azerbaijan_stockers</a> на Freepik',
            'link' => 'chicken-eggs',
            'order' => 1,
            'catalog_level_one_id' => 4,
            'title' => 'Куринные яйца',
        ],
        [
            'image' => 'public/catalog/levelOne/items/eggs/images/main/sub/quail/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/wooden-bowl-of-raw-quail-eggs-on-stone-table_14411827.htm#query=%D0%BF%D0%B5%D1%80%D0%B5%D0%BF%D0%B5%D0%BB%D0%B8%D0%BD%D0%BD%D1%8B%D0%B5%20%D1%8F%D0%B9%D1%86%D0%B0&position=15&from_view=search&track=ais">Изображение от BalashMirzabey</a> на Freepik',
            'link' => 'quail',
            'order' => 1,
            'catalog_level_one_id' => 4,
            'title' => 'Перепелинные яйца',
        ],
        [
            'image' => 'public/catalog/levelOne/items/eggs/images/main/sub/other/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/basket-full-of-eggs-in-nest-on-white-table_7520055.htm#query=%D1%8F%D0%B9%D1%86%D0%B0&position=40&from_view=search&track=sph">Изображение от stockking</a> на Freepik',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 4,
            'title' => 'Остальное',
        ],




        // Фрукты
        [
            'image' => 'public/catalog/levelOne/items/fruit/images/main/sub/apple/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/red-apple-in-basket_4011181.htm#query=%D1%8F%D0%B1%D0%BB%D0%BE%D0%BA%D0%B8&position=0&from_view=search&track=sph?log-in=google">Изображение от lifeforstock</a> на Freepik',
            'link' => 'apple',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Яблоки',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fruit/images/main/sub/pears/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/two-pears_923575.htm#query=pears&position=1&from_view=search&track=sph">Изображение от ilovehz</a> на Freepik',
            'link' => 'pears',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Груши',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fruit/images/main/sub/tangerines/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/mandarin-isolated-on-white-background_21059491.htm#query=%D0%9C%D0%B0%D0%BD%D0%B4%D0%B0%D1%80%D0%B8%D0%BD%D1%8B&position=4&from_view=search&track=sph">Изображение от fabrikasimf</a> на Freepik',
            'link' => 'tangerines',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Мандарины',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fruit/images/main/sub/oranges/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/cut-and-whole-orange-fruits-with-green-leaves_8132442.htm#query=%D0%90%D0%BF%D0%B5%D0%BB%D1%8C%D1%81%D0%B8%D0%BD%D1%8B&position=5&from_view=search&track=sph">Изображение от pch.vector</a> на Freepik',
            'link' => 'oranges',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Апельсины',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fruit/images/main/sub/bananas/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-vector/vector-ripe-yellow-banana-bunch-isolated-on-white-background_11053232.htm#query=%D0%91%D0%B0%D0%BD%D0%B0%D0%BD%D1%8B&position=0&from_view=search&track=sph">Изображение от macrovector</a> на Freepik',
            'link' => 'bananas',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Бананы',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fruit/images/main/sub/mango/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/mango_8172394.htm#query=%D0%9C%D0%B0%D0%BD%D0%B3%D0%BE&position=43&from_view=search&track=sph">Изображение от Racool_studio</a> на Freepik',
            'link' => 'mango',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Манго',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fruit/images/main/sub/grape/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/front-view-fresh-grapes-around-christmas-toys-on-dark-background-fruit-wine-color-xmas_17176601.htm#query=%D0%92%D0%B8%D0%BD%D0%BE%D0%B3%D1%80%D0%B0%D0%B4&position=17&from_view=search&track=sph">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'grape',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Виноград',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fruit/images/main/sub/plum/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/prunes-with-several-leaves-in-water-drops-closeup-selective-focus-shallow-depth-of-fieldphoto-of-food-ripe-fruit-plum-harvesting-prunes-in-autumn-ecoproducts-from-the-farm-fruit-product-image_30865314.htm#query=%D0%A1%D0%BB%D0%B8%D0%B2%D0%B0&position=7&from_view=search&track=sph">Изображение от ededchechine</a> на Freepik',
            'link' => 'plum',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Слива',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fruit/images/main/sub/persimmon/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/fresh-persimmon-fruit-on-wooden-table_20916488.htm#query=%D0%A5%D1%83%D1%80%D0%BC%D0%B0&position=13&from_view=search&track=sph">Изображение от chandlervid85</a> на Freepik',
            'link' => 'persimmon',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Хурма',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fruit/images/main/sub/quince/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/top-view-fresh-sour-quinces-on-dark-background_17115865.htm#query=%D0%90%D0%B9%D0%B2%D0%B0&position=9&from_view=search&track=sph">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'quince',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Айва',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fruit/images/main/sub/kiwi/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/fresh-kiwi-fruit-isolated_8759405.htm#query=%D0%9A%D0%B8%D0%B2%D0%B8&position=0&from_view=search&track=sph">Изображение от Racool_studio</a> на Freepik',
            'link' => 'kiwi',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Киви',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fruit/images/main/sub/grapefruit/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/top-view-of-tasty-grapefruits-fruit-slices-inside-plate-on-the-pink-surface_14072197.htm#query=%D0%93%D1%80%D0%B5%D0%B9%D0%BF%D1%84%D1%80%D1%83%D1%82&position=13&from_view=search&track=sph?log-in=email">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'grapefruit',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Грейпфрут',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fruit/images/main/sub/pomegranate/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/sliced-ripe-pomegranate-on-a-wooden-board_13978207.htm#query=pomegranate&position=35&from_view=search&track=sph">Изображение от azerbaijan_stockers</a> на Freepik',
            'link' => 'pomegranate',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Гранат',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fruit/images/main/sub/lemon/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/lemon_1187464.htm#query=%D0%9B%D0%B8%D0%BC%D0%BE%D0%BD&position=0&from_view=search&track=sph">Изображение от dashu83</a> на Freepik',
            'link' => 'lemon',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Лимон',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fruit/images/main/sub/peaches/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/top-view-fresh-ripe-peaches-delicious-summer-fruits-on-light-white-desk_12469978.htm#query=%D0%9F%D0%B5%D1%80%D1%81%D0%B8%D0%BA%D0%B8&position=3&from_view=search&track=sph">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'peaches',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Персики',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fruit/images/main/sub/coconut/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/coconut-on-the-table_7460526.htm#query=%D0%9A%D0%BE%D0%BA%D0%BE%D1%81&position=0&from_view=search&track=sph">Изображение от Racool_studio</a> на Freepik',
            'link' => 'coconut',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Кокос',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fruit/images/main/sub/avocado/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/avocado_1271566.htm#query=%D0%90%D0%B2%D0%BE%D0%BA%D0%B0%D0%B4%D0%BE&position=2&from_view=search&track=sph">Изображение от dashu83</a> на Freepik',
            'link' => 'avocado',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Авокадо',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fruit/images/main/sub/watermelon/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/slices-of-juicy-and-tasty-watermelon-on-a-white-plate_7688810.htm#query=%D0%90%D1%80%D0%B1%D1%83%D0%B7&position=1&from_view=search&track=sph">Изображение от timolina</a> на Freepik',
            'link' => 'watermelon',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Арбуз',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fruit/images/main/sub/melon/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/front-view-mellow-melon-sliced-and-whole-sweet-on-grey-fruit-fresh-sweet-summer_9383868.htm#query=%D0%94%D1%8B%D0%BD%D1%8F&position=1&from_view=search&track=sph">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'melon',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Дыня',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fruit/images/main/sub/pineapple/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/pineapple-juicy-mellow-isolated-on-white_8081037.htm#query=%D0%90%D0%BD%D0%B0%D0%BD%D0%B0%D1%81&position=0&from_view=search&track=sph">Изображение от mdjaff</a> на Freepik',
            'link' => 'pineapple',
            'order' => 1,
            'catalog_level_one_id' => 5,
            'title' => 'Ананас',
        ],
        [
            'image' => 'public/catalog/levelOne/items/fruit/images/main/sub/other/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/top-view-fresh-tangerines-with-lemons-and-plums-on-light-white-desk_16904315.htm#query=%D0%9D%D0%B0%D0%B1%D0%BE%D1%80%20%D1%84%D1%80%D1%83%D0%BA%D1%82%D0%BE%D0%B2&position=25&from_view=search&track=ais">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 5,
            'title' => 'Остальное',
        ],









        // Овощи
        [
            'image' => 'public/catalog/levelOne/items/vegetables/images/main/sub/potato/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/top-view-raw-potatoes-on-table_8123608.htm#query=%D0%9A%D0%B0%D1%80%D1%82%D0%BE%D1%84%D0%B5%D0%BB%D1%8C&position=3&from_view=search&track=sph">Freepik</a>',
            'link' => 'potato',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Картофель',
        ],
        [
            'image' => 'public/catalog/levelOne/items/vegetables/images/main/sub/tomato/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/cherry-tomatoes-on-a-branch-with-parsley_6022660.htm#query=%D0%9F%D0%BE%D0%BC%D0%B8%D0%B4%D0%BE%D1%80%D1%8B&position=4&from_view=search&track=sph">Изображение от Racool_studio</a> на Freepik',
            'link' => 'tomato',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Помидоры',
        ],
        [
            'image' => 'public/catalog/levelOne/items/vegetables/images/main/sub/cucumbers/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/cucumber-isolated_21061430.htm#query=%D0%9E%D0%B3%D1%83%D1%80%D1%86%D1%8B&position=0&from_view=search&track=sph">Изображение от fabrikasimf</a> на Freepik',
            'link' => 'cucumbers',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Огурцы',
        ],
        [
            'image' => 'public/catalog/levelOne/items/vegetables/images/main/sub/cabbage/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/fresh-cabbage_1130062.htm#page=2&query=%D0%9A%D0%B0%D0%BF%D1%83%D1%81%D1%82%D0%B0&position=31&from_view=search&track=sph">Изображение от topntp26</a> на Freepik',
            'link' => 'cabbage',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Капуста',
        ],
        [
            'image' => 'public/catalog/levelOne/items/vegetables/images/main/sub/bulb_onions/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/high-angle-arrangement-with-onions_13402774.htm#query=%D0%9B%D1%83%D0%BA%20%D1%80%D0%B5%D0%BF%D1%87%D0%B0%D1%82%D1%8B%D0%B9&position=5&from_view=search&track=ais">Freepik</a>',
            'link' => 'bulb_onions',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Лук репчатый',
        ],
        [
            'image' => 'public/catalog/levelOne/items/vegetables/images/main/sub/greens/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/fresh-parsley-isolated_8759337.htm#query=greens&position=10&from_view=search&track=sph">Изображение от Racool_studio</a> на Freepik',
            'link' => 'greens',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Зелень',
        ],
        [
            'image' => 'public/catalog/levelOne/items/vegetables/images/main/sub/eggplant/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/front-view-aubergines-garlic-black-pepper-on-straw-tablecloth_16180783.htm#query=%D0%91%D0%B0%D0%BA%D0%BB%D0%B0%D0%B6%D0%B0%D0%BD&position=10&from_view=search&track=sph">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'eggplant',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Баклажан',
        ],
        [
            'image' => 'public/catalog/levelOne/items/vegetables/images/main/sub/pumpkin/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/fresh-pumpkin_1129835.htm#query=%D0%A2%D1%8B%D0%BA%D0%B2%D0%B0&position=1&from_view=search&track=sph">Изображение от topntp26</a> на Freepik',
            'link' => 'pumpkin',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Тыква',
        ],
        [
            'image' => 'public/catalog/levelOne/items/vegetables/images/main/sub/vegetable_marrow/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/the-two-zucchini-on-wooden-table_6755858.htm#page=3&query=%D0%9A%D0%B0%D0%B1%D0%B0%D1%87%D0%BE%D0%BA&position=10&from_view=search&track=sph">Изображение от master1305</a> на Freepik',
            'link' => 'vegetable_marrow',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Кабачок',
        ],
        [
            'image' => 'public/catalog/levelOne/items/vegetables/images/main/sub/pepper/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/green-peppers-isolatedon-white_11943113.htm#page=2&query=%D0%9F%D0%B5%D1%80%D0%B5%D1%86&position=1&from_view=search&track=sph?log-in=google">Изображение от azerbaijan_stockers</a> на Freepik',
            'link' => 'pepper',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Перец',
        ],
        [
            'image' => 'public/catalog/levelOne/items/vegetables/images/main/sub/beet/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/beetroot-juice-on-wooden-table_8737340.htm#query=%D0%A1%D0%B2%D0%B5%D0%BA%D0%BB%D0%B0&position=2&from_view=search&track=sph">Изображение от Racool_studio</a> на Freepik',
            'link' => 'beet',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Свекла',
        ],
        [
            'image' => 'public/catalog/levelOne/items/vegetables/images/main/sub/carrot/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/delicious-carrot-raw_10787530.htm#query=%D0%9C%D0%BE%D1%80%D0%BA%D0%BE%D0%B2%D1%8C&position=3&from_view=search&track=sph">Изображение от Racool_studio</a> на Freepik',
            'link' => 'carrot',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Морковь',
        ],
        [
            'image' => 'public/catalog/levelOne/items/vegetables/images/main/sub/garlic/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/fresh-raw-garlic-ready-to-cook_13901148.htm#query=%D0%A7%D0%B5%D1%81%D0%BD%D0%BE%D0%BA&position=1&from_view=search&track=sph">Изображение от jcomp</a> на Freepik',
            'link' => 'garlic',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Чеснок',
        ],
        [
            'image' => 'public/catalog/levelOne/items/vegetables/images/main/sub/radish/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/top-view-of-radishes-in-basket-plate-on-plaid-cloth-on-right-side-and-wooden-background-with-copy-space_8908648.htm#query=%D0%A0%D0%B5%D0%B4%D0%B8%D1%81%D0%BA%D0%B0&position=6&from_view=search&track=sph">Изображение от stockking</a> на Freepik',
            'link' => 'radish',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Редиска',
        ],
        [
            'image' => 'public/catalog/levelOne/items/vegetables/images/main/sub/radish_grey/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/organic-market-fresh-white-radish-surface_6815007.htm#query=%D0%A0%D0%B5%D0%B4%D1%8C%D0%BA%D0%B0&position=2&from_view=search&track=sph">Изображение от 8photo</a> на Freepik',
            'link' => 'radish_grey',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Редька',
        ],
        [
            'image' => 'public/catalog/levelOne/items/vegetables/images/main/sub/corn/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/high-angle-fresh-corn-composition_9749493.htm#query=%D0%9A%D1%83%D0%BA%D1%83%D1%80%D1%83%D0%B7%D0%B0&position=2&from_view=search&track=sph">Freepik</a>',
            'link' => 'corn',
            'order' => 1,
            'catalog_level_one_id' => 6,
            'title' => 'Кукуруза',
        ],
        [
            'image' => 'public/catalog/levelOne/items/vegetables/images/main/sub/other/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/healthy-vegetables-on-wooden-table_13013675.htm#query=%D0%9E%D0%B2%D0%BE%D1%89%D0%B8&position=2&from_view=search&track=sph">Изображение от jcomp</a> на Freepik',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 6,
            'title' => 'Остальное',
        ],








        // Ягода
        [
            'image' => 'public/catalog/levelOne/items/berry/images/main/sub/blueberry/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/word-bilberry-diet-white-green_1174690.htm#query=blueberry&position=24&from_view=search&track=sph">Изображение от 4045</a> на Freepik',
            'link' => 'blueberry',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Голубика',
        ],
        [
            'image' => 'public/catalog/levelOne/items/berry/images/main/sub/strawberry/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/strawberries_1012241.htm#query=%D0%9A%D0%BB%D1%83%D0%B1%D0%BD%D0%B8%D0%BA%D0%B0&position=18&from_view=search&track=sph">Изображение от kues1</a> на Freepik',
            'link' => 'strawberry',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Клубника',
        ],
        [
            'image' => 'public/catalog/levelOne/items/berry/images/main/sub/raspberry/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/fresh-raspberries-flat-lay-food-photography_15439876.htm#query=%D0%9C%D0%B0%D0%BB%D0%B8%D0%BD%D0%B0&position=7&from_view=search&track=sph">Изображение от rawpixel.com</a> на Freepik',
            'link' => 'raspberry',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Малина',
        ],
        [
            'image' => 'public/catalog/levelOne/items/berry/images/main/sub/bird_cherry/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/closeup-shot-of-bird-cherry-prunus-padus-tree-with-ripe-berries-in-sun-rays_13235018.htm#query=%D1%87%D0%B5%D1%80%D0%B5%D0%BC%D1%83%D1%85%D0%B0&position=0&from_view=search&track=sph">Изображение от wirestock</a> на Freepik',
            'link' => 'bird_cherry',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Черемуха',
        ],
        [
            'image' => 'public/catalog/levelOne/items/berry/images/main/sub/chokeberry/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/lots-of-blueberries_5873712.htm#page=2&query=%D1%87%D0%B5%D1%80%D0%BD%D0%B0%D1%8F%20%D1%81%D0%BC%D0%BE%D1%80%D0%BE%D0%B4%D0%B8%D0%BD%D0%B0&position=6&from_view=search&track=ais">Изображение от Racool_studio</a> на Freepik',
            'link' => 'chokeberry',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Черноплодная рябина',
        ],
        [
            'image' => 'public/catalog/levelOne/items/berry/images/main/sub/ashberry/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/rowan-berries-on-a-branch-sorbus-alnifolia-sorbus-aucuparia_23457294.htm#page=2&query=%D0%A0%D1%8F%D0%B1%D0%B8%D0%BD%D0%B0&position=19&from_view=search&track=sph">Изображение от montypeter</a> на Freepik',
            'link' => 'ashberry',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Рябина',
        ],
        [
            'image' => 'public/catalog/levelOne/items/berry/images/main/sub/honeysuckle/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/blueberries-top-view_877604.htm#query=%D0%96%D0%B8%D0%BC%D0%BE%D0%BB%D0%BE%D1%81%D1%82%D1%8C&position=45&from_view=search&track=sph">Изображение от onlyyouqj</a> на Freepik',
            'link' => 'honeysuckle',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Жимолость',
        ],
        [
            'image' => 'public/catalog/levelOne/items/berry/images/main/sub/currant/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/top-view-of-black-currant-in-a-bowl-on-a-gray-surface_9636996.htm#query=%D0%A1%D0%BC%D0%BE%D1%80%D0%BE%D0%B4%D0%B8%D0%BD%D0%B0&position=30&from_view=search&track=sph">Изображение от stockking</a> на Freepik',
            'link' => 'currant',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Смородина',
        ],
        [
            'image' => 'public/catalog/levelOne/items/berry/images/main/sub/gooseberry/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/green-gooseberries-in-a-wooden-bowl_7121443.htm#page=2&query=%D0%9A%D1%80%D1%8B%D0%B6%D0%BE%D0%B2%D0%BD%D0%B8%D0%BA&position=20&from_view=search&track=sph">Изображение от timolina</a> на Freepik',
            'link' => 'gooseberry',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Крыжовник',
        ],
        [
            'image' => 'public/catalog/levelOne/items/berry/images/main/sub/strawberry_small/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/organic-wild-ripe-strawberry-in-forest-macro-shot-focus-on-a-foreground-blurred-background-close-up_27212590.htm#query=%D0%97%D0%B5%D0%BC%D0%BB%D1%8F%D0%BD%D0%B8%D0%BA%D0%B0&position=16&from_view=search&track=sph">Изображение от YuliiaKa</a> на Freepik',
            'link' => 'strawberry_small',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Земляника',
        ],
        [
            'image' => 'public/catalog/levelOne/items/berry/images/main/sub/sea_buckthorn/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/top-half-view-sea-buckthorn-in-bowl-on-dark-red-surface_12063193.htm#query=%D0%9E%D0%B1%D0%BB%D0%B5%D0%BF%D0%B8%D1%85%D0%B0&position=27&from_view=search&track=sph">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'sea_buckthorn',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Облепиха',
        ],
        [
            'image' => 'public/catalog/levelOne/items/berry/images/main/sub/cranberry/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/top-view-cranberries-arrangement_12097040.htm#query=%D0%9A%D0%BB%D1%8E%D0%BA%D0%B2%D0%B0&position=0&from_view=search&track=sph">Freepik</a>',
            'link' => 'cranberry',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Клюква',
        ],
        [
            'image' => 'public/catalog/levelOne/items/berry/images/main/sub/lingonberry/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/a-front-view-red-lingonberry-inside-round-glass-plate-on-the-grey-desk-cranberry_9597415.htm#query=%D0%91%D1%80%D1%83%D1%81%D0%BD%D0%B8%D0%BA%D0%B0&position=47&from_view=search&track=sph">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'lingonberry',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Брусника',
        ],
        [
            'image' => 'public/catalog/levelOne/items/berry/images/main/sub/blackberry/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/tasty-ripe-sweet-healthy-blackberry_9655442.htm#query=%D0%95%D0%B6%D0%B5%D0%B2%D0%B8%D0%BA%D0%B0&position=6&from_view=search&track=sph">Изображение от azerbaijan_stockers</a> на Freepik',
            'link' => 'blackberry',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Ежевика',
        ],
        [
            'image' => 'public/catalog/levelOne/items/berry/images/main/sub/hawthorn/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/hawthorn_1016999.htm#query=hawthorn&from_query=%D0%91%D0%BE%D1%8F%D1%80%D1%8B%D1%88%D0%BD%D0%B8%D0%BA&position=0&from_view=search&track=sph">Изображение от dashu83</a> на Freepik',
            'link' => 'hawthorn',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Боярышник',
        ],
        [
            'image' => 'public/catalog/levelOne/items/berry/images/main/sub/fig/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/figs-cut-into-slices-on-a-wooden-cutting-board-closeup-selective-focus-horizontal-frame-seasonal-ripe-fig-fruits-mediterranean-diet-idea-for-advertising_31427008.htm#query=%D0%98%D0%BD%D0%B6%D0%B8%D1%80&position=6&from_view=search&track=sph">Изображение от ededchechine</a> на Freepik',
            'link' => 'fig',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Инжир',
        ],
        [
            'image' => 'public/catalog/levelOne/items/berry/images/main/sub/merry/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/delicious-berries-on-the-table_6255570.htm#query=%D0%A7%D0%B5%D1%80%D0%B5%D1%88%D0%BD%D1%8F&position=6&from_view=search&track=sph">Изображение от Racool_studio</a> на Freepik',
            'link' => 'merry',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Черешня',
        ],
        [
            'image' => 'public/catalog/levelOne/items/berry/images/main/sub/cherry/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/big-cherry-on-white-background_1192767.htm#query=%D0%A7%D0%B5%D1%80%D0%B5%D1%88%D0%BD%D1%8F&position=1&from_view=search&track=sph">Изображение от xb100</a> на Freepik',
            'link' => 'cherry',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Вишня',
        ],
        [
            'image' => 'public/catalog/levelOne/items/berry/images/main/sub/irga/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/white-plate-of-delicious-fresh-blueberries-on-marble-surface_17189850.htm#query=shadberry&position=38&from_view=search&track=ais?log-in=google">Изображение от azerbaijan_stockers</a> на Freepik',
            'link' => 'irga',
            'order' => 1,
            'catalog_level_one_id' => 7,
            'title' => 'Ирга',
        ],
        [
            'image' => 'public/catalog/levelOne/items/berry/images/main/sub/other/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/various-fresh-summer-berries-blueberries-red-currant-strawberries-blackberries-top-view_9691390.htm#query=%D0%B0%D1%81%D1%81%D0%BE%D1%80%D1%82%D0%B8%20%D1%8F%D0%B3%D0%BE%D0%B4%D1%8B&position=5&from_view=search&track=ais">Изображение от azerbaijan_stockers</a> на Freepik',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 7,
            'title' => 'Остальное',
        ],






        // Хлеб
        [
            'image' => 'public/catalog/levelOne/items/bread/images/main/sub/wheat/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/bakery-product-isolated-on-a-wooden-background-freshly-baked-bread-and-spikelets-of-wheat_25192960.htm#query=%D0%A5%D0%BB%D0%B5%D0%B1%20%D0%BF%D1%88%D0%B5%D0%BD%D0%B8%D1%87%D0%BD%D1%8B%D0%B9&position=3&from_view=search&track=ais">Изображение от fxquadro</a> на Freepik',
            'link' => 'wheat',
            'order' => 1,
            'catalog_level_one_id' => 8,
            'title' => 'Хлеб пшеничный',
        ],
        [
            'image' => 'public/catalog/levelOne/items/bread/images/main/sub/rye/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/delicious-homemade-bread_9614014.htm#query=%D0%A5%D0%BB%D0%B5%D0%B1%20%D1%80%D0%B6%D0%B0%D0%BD%D0%BE%D0%B9&position=10&from_view=search&track=ais">Изображение от Racool_studio</a> на Freepik',
            'link' => 'rye',
            'order' => 1,
            'catalog_level_one_id' => 8,
            'title' => 'Хлеб ржаной',
        ],
        [
            'image' => 'public/catalog/levelOne/items/bread/images/main/sub/tortillas/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/pile-of-flatbreads-with-salt-front-view_5035574.htm#query=%D0%9B%D0%B0%D0%B2%D0%B0%D1%88&position=2&from_view=search&track=sph">Freepik</a>',
            'link' => 'tortillas',
            'order' => 1,
            'catalog_level_one_id' => 8,
            'title' => 'Лаваш, лепешки',
        ],
        [
            'image' => 'public/catalog/levelOne/items/bread/images/main/sub/sweet_pies/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/front-view-tasty-baked-hotcakes-with-glass-of-milk_15860032.htm#query=%D0%9F%D0%B8%D1%80%D0%BE%D0%B6%D0%BA%D0%B8%20%D1%81%D0%BB%D0%B0%D0%B4%D0%BA%D0%B8%D0%B5&position=49&from_view=search&track=ais">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'sweet_pies',
            'order' => 1,
            'catalog_level_one_id' => 8,
            'title' => 'Сладкие пирожки и пироги',
        ],
        [
            'image' => 'public/catalog/levelOne/items/bread/images/main/sub/hearty_pies/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/front-view-yummy-meat-pie-with-greens-and-tomatoes-on-dark-background-biscuit-cake-food-pies-pastry-oven-bake-dough-color_17243937.htm#query=%D0%9F%D0%B8%D1%80%D0%BE%D0%B3%20%D1%81%20%D1%80%D1%8B%D0%B1%D0%BE%D0%B9&position=2&from_view=search&track=ais">Изображение от mdjaff</a> на Freepik',
            'link' => 'hearty_pies',
            'order' => 1,
            'catalog_level_one_id' => 8,
            'title' => 'Сытные пирожки и пироги',
        ],
        [
            'image' => 'public/catalog/levelOne/items/bread/images/main/sub/buns/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/sweet-pastry-assortment-top-view_7781342.htm#query=%D0%91%D1%83%D0%BB%D0%BE%D1%87%D0%BA%D0%B8&position=0&from_view=search&track=sph">Freepik</a>',
            'link' => 'buns',
            'order' => 1,
            'catalog_level_one_id' => 8,
            'title' => 'Булочки',
        ],
        [
            'image' => 'public/catalog/levelOne/items/bread/images/main/sub/crackers/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/donuts-bagels-crackers-bakery-products-belarusian-food-products_25203742.htm#query=%D0%A1%D1%83%D1%88%D0%BA%D0%B8&position=12&from_view=search&track=sph">Изображение от user15285612</a> на Freepik',
            'link' => 'crackers',
            'order' => 1,
            'catalog_level_one_id' => 8,
            'title' => 'Сушки и сухарики',
        ],
        [
            'image' => 'public/catalog/levelOne/items/bread/images/main/sub/other/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/different-types-of-bread-made-from-wheat-flour_7220003.htm#query=%D1%85%D0%BB%D0%B5%D0%B1&position=0&from_view=search&track=sph?log-in=google">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 8,
            'title' => 'Остальное',
        ],








        // Кондитерские изделия
        [
            'image' => 'public/catalog/levelOne/items/confectionery/images/main/sub/cakes_big/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/assortment-of-pieces-of-cake_17116599.htm#query=%D0%A2%D0%BE%D1%80%D1%82%D1%8B&position=49&from_view=search&track=sph">Изображение от azerbaijan_stockers</a> на Freepik',
            'link' => 'cakes_big',
            'order' => 1,
            'catalog_level_one_id' => 9,
            'title' => 'Торты',
        ],
        [
            'image' => 'public/catalog/levelOne/items/confectionery/images/main/sub/cakes/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/top-view-yummy-creamy-cakes-little-desserts-for-tea-with-fruits-and-chocolate-chips-on-a-white-surface-fruit-cake-cream-biscuit-pie-tea_16925338.htm#page=2&query=%D0%9F%D0%B8%D1%80%D0%BE%D0%B6%D0%BD%D1%8B%D0%B5&position=29&from_view=search&track=sph">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'cakes',
            'order' => 1,
            'catalog_level_one_id' => 9,
            'title' => 'Пирожные',
        ],
        [
            'image' => 'public/catalog/levelOne/items/confectionery/images/main/sub/cupcakes/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/delicious-muffins-arrangement-top-view_31112433.htm#query=%D0%9A%D0%B5%D0%BA%D1%81%D1%8B&position=21&from_view=search&track=sph">Freepik</a>',
            'link' => 'cupcakes',
            'order' => 1,
            'catalog_level_one_id' => 9,
            'title' => 'Кексы',
        ],
        [
            'image' => 'public/catalog/levelOne/items/confectionery/images/main/sub/gingerbreads/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/beverage-and-gingerbread-near-scarf-and-book_2810333.htm#query=%D0%9F%D1%80%D1%8F%D0%BD%D0%B8%D0%BA%D0%B8&position=11&from_view=search&track=sph">Freepik</a>',
            'link' => 'gingerbreads',
            'order' => 1,
            'catalog_level_one_id' => 9,
            'title' => 'Пряники',
        ],
        [
            'image' => 'public/catalog/levelOne/items/confectionery/images/main/sub/candies/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/closeup-shot-of-chocolate-candy-isolated_15520864.htm#query=%D0%9A%D0%BE%D0%BD%D1%84%D0%B5%D1%82%D1%8B&position=15&from_view=search&track=sph">Изображение от wirestock</a> на Freepik',
            'link' => 'candies',
            'order' => 1,
            'catalog_level_one_id' => 9,
            'title' => 'Конфеты',
        ],
        [
            'image' => 'public/catalog/levelOne/items/confectionery/images/main/sub/marshmallows/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/pile-of-cookies-and-marshmallows-on-a-platter-on-marble-surface_16698934.htm#query=%D0%97%D0%B5%D1%84%D0%B8%D1%80&position=15&from_view=search&track=sph">Изображение от azerbaijan_stockers</a> на Freepik',
            'link' => 'marshmallows',
            'order' => 1,
            'catalog_level_one_id' => 9,
            'title' => 'Зефир',
        ],
        [
            'image' => 'public/catalog/levelOne/items/confectionery/images/main/sub/chocolate/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/chocolate-bar-and-coffee-beans_5909263.htm#page=2&query=%D0%A8%D0%BE%D0%BA%D0%BE%D0%BB%D0%B0%D0%B4&position=49&from_view=search&track=sph">Изображение от Racool_studio</a> на Freepik',
            'link' => 'chocolate',
            'order' => 1,
            'catalog_level_one_id' => 9,
            'title' => 'Шоколад',
        ],
        [
            'image' => 'public/catalog/levelOne/items/confectionery/images/main/sub/pastille/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/healthy-assorted-dried-fruit-and-fruit-lozenge_15831706.htm#query=%D0%9F%D0%B0%D1%81%D1%82%D0%B8%D0%BB%D0%B0&position=3&from_view=search&track=sph">Изображение от serhii_bobyk</a> на Freepik',
            'link' => 'pastille',
            'order' => 1,
            'catalog_level_one_id' => 9,
            'title' => 'Пастила',
        ],
        [
            'image' => 'public/catalog/levelOne/items/confectionery/images/main/sub/oriental/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/traditional-turkish-delight-oriental-sweets_10944475.htm#query=%D0%92%D0%BE%D1%81%D1%82%D0%BE%D1%87%D0%BD%D1%8B%D0%B5%20%D1%81%D0%BB%D0%B0%D0%B4%D0%BE%D1%81%D1%82%D0%B8&position=10&from_view=search&track=ais">Изображение от azerbaijan_stockers</a> на Freepik',
            'link' => 'oriental',
            'order' => 1,
            'catalog_level_one_id' => 9,
            'title' => 'Восточные сладости',
        ],
        [
            'image' => 'public/catalog/levelOne/items/confectionery/images/main/sub/cookie/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/christmas-cookies_1471784.htm#query=%D0%9F%D1%80%D1%8F%D0%BD%D0%B8%D0%BA%D0%B8&position=2&from_view=search&track=sph">Изображение от senivpetro</a> на Freepik',
            'link' => 'cookie',
            'order' => 1,
            'catalog_level_one_id' => 9,
            'title' => 'Печенье',
        ],
        [
            'image' => 'public/catalog/levelOne/items/confectionery/images/main/sub/other/1.jpeg',
            'image_licence_link' => '',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 9,
            'title' => 'Остальное',
        ],









        // Чай
        [
            'image' => 'public/catalog/levelOne/items/tea/images/main/sub/black/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/dry-tea-leaves-with-teapot-on-wooden-board_12884163.htm#query=%D0%A7%D0%B5%D1%80%D0%BD%D1%8B%D0%B9%20%D1%87%D0%B0%D0%B9&position=3&from_view=search&track=ais">Изображение от azerbaijan_stockers</a> на Freepik',
            'link' => 'black',
            'order' => 1,
            'catalog_level_one_id' => 10,
            'title' => 'Черный чай',
        ],
        [
            'image' => 'public/catalog/levelOne/items/tea/images/main/sub/green/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/high-angle-view-of-dry-leaves-and-herb-tea-on-textured-backdrop_5069928.htm#query=%D0%A7%D0%B5%D1%80%D0%BD%D1%8B%D0%B9%20%D1%87%D0%B0%D0%B9&position=19&from_view=search&track=ais">Freepik</a>',
            'link' => 'green',
            'order' => 1,
            'catalog_level_one_id' => 10,
            'title' => 'Зеленый чай',
        ],
        [
            'image' => 'public/catalog/levelOne/items/tea/images/main/sub/leaves/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/assortment-of-dry-tea-in-golden-vintage-mini-plates-tea-types_7999098.htm#query=%D0%A2%D1%80%D0%B0%D0%B2%D1%8B%20%D0%B4%D0%BB%D1%8F%20%D1%87%D0%B0%D1%8F&position=34&from_view=search&track=ais">Изображение от azerbaijan_stockers</a> на Freepik',
            'link' => 'leaves',
            'order' => 1,
            'catalog_level_one_id' => 10,
            'title' => 'Травы, листья и сборы',
        ],
        [
            'image' => 'public/catalog/levelOne/items/tea/images/main/sub/other/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/bowls-and-spoons-with-herbal-tea_8385064.htm#query=%D0%A2%D1%80%D0%B0%D0%B2%D1%8B%20%D0%B4%D0%BB%D1%8F%20%D1%87%D0%B0%D1%8F&position=45&from_view=search&track=ais">Freepik</a>',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 10,
            'title' => 'Остальное',
        ],






        // Мед
        [
            'image' => 'public/catalog/levelOne/items/honey/images/main/sub/honey/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/delicious-honey-on-dark-surface_13806932.htm#query=honey&position=22&from_view=search&track=sph">Изображение от jcomp</a> на Freepik',
            'link' => 'honey',
            'order' => 1,
            'catalog_level_one_id' => 11,
            'title' => 'Мед',
        ],
        [
            'image' => 'public/catalog/levelOne/items/honey/images/main/sub/perga/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/wooden-spoon-bee-pollen-seeds-candies-and-jar-of-honey-on-sack-cloth_3434406.htm#page=2&query=%D1%82%D0%BE%D0%B2%D0%B0%D1%80%D1%8B%20%D0%BF%D1%87%D0%B5%D0%BB%D0%BE%D0%B2%D0%BE%D0%B4%D1%81%D1%82%D0%B2%D0%B0&position=49&from_view=search&track=ais">Freepik</a>',
            'link' => 'perga',
            'order' => 1,
            'catalog_level_one_id' => 11,
            'title' => 'Перга',
        ],
        [
            'image' => 'public/catalog/levelOne/items/honey/images/main/sub/other/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/honeycomb-bee-pollen-honey-and-bread-slice-over-wooden-surface_5223266.htm#page=3&query=%D0%BC%D0%B5%D0%B4&position=37&from_view=search&track=sph">Freepik</a>',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 11,
            'title' => 'Остальное',
        ],







        // Бакалея
        [
            'image' => 'public/catalog/levelOne/items/grocery/images/main/sub/buckwheat/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/top-view-tasty-cooked-buckwheat-inside-plate-on-grey-space_15262947.htm#query=%D0%93%D1%80%D0%B5%D1%87%D0%BD%D0%B5%D0%B2%D0%B0%D1%8F%20%D0%BA%D1%80%D1%83%D0%BF%D0%B0&position=10&from_view=search&track=ais">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'buckwheat',
            'order' => 1,
            'catalog_level_one_id' => 12,
            'title' => 'Гречневая крупа',
        ],
        [
            'image' => 'public/catalog/levelOne/items/grocery/images/main/sub/oatmeal/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/raw-barley-grain-in-old-dark-background_13013486.htm#query=%D0%9E%D0%B2%D1%81%D1%8F%D0%BD%D0%BD%D0%B0%D1%8F%20%D0%BA%D1%80%D1%83%D0%BF%D0%B0&position=1&from_view=search&track=ais">Изображение от jcomp</a> на Freepik',
            'link' => 'oatmeal',
            'order' => 1,
            'catalog_level_one_id' => 12,
            'title' => 'Овсянная крупа',
        ],
        [
            'image' => 'public/catalog/levelOne/items/grocery/images/main/sub/rice/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/high-angle-bowl-with-rice-and-grains-assortment_25128838.htm#query=%D0%A0%D0%B8%D1%81&position=14&from_view=search&track=sph">Freepik</a>',
            'link' => 'rice',
            'order' => 1,
            'catalog_level_one_id' => 12,
            'title' => 'Рис',
        ],
        [
            'image' => 'public/catalog/levelOne/items/grocery/images/main/sub/millet/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/background-full-couscous_897359.htm#query=%D0%9F%D1%88%D0%B5%D0%BD%D0%BE&position=33&from_view=search&track=sph">Изображение от evening_tao</a> на Freepik',
            'link' => 'millet',
            'order' => 1,
            'catalog_level_one_id' => 12,
            'title' => 'Пшено',
        ],
        [
            'image' => 'public/catalog/levelOne/items/grocery/images/main/sub/corn/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/top-view-corn-seeds-surface_6815037.htm#query=%D0%9A%D1%83%D0%BA%D1%83%D1%80%D1%83%D0%B7%D0%BD%D0%B0%D1%8F%20%D0%BA%D1%80%D1%83%D0%BF%D0%B0&position=6&from_view=search&track=ais">Изображение от 8photo</a> на Freepik',
            'link' => 'corn',
            'order' => 1,
            'catalog_level_one_id' => 12,
            'title' => 'Кукурузная крупа',
        ],
        [
            'image' => 'public/catalog/levelOne/items/grocery/images/main/sub/semolina/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/semolina-porridge-with-side-jam-selection_6980846.htm#query=semolina&position=17&from_view=search&track=sph">Изображение от stockking</a> на Freepik',
            'link' => 'semolina',
            'order' => 1,
            'catalog_level_one_id' => 12,
            'title' => 'Манная крупа',
        ],
        [
            'image' => 'public/catalog/levelOne/items/grocery/images/main/sub/beans/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/red-kidney-beans-in-a-small-bowl-place-on-sack-fabric_11994590.htm#query=%D0%A4%D0%B0%D1%81%D0%BE%D0%BB%D1%8C&position=0&from_view=search&track=sph">Изображение от jcomp</a> на Freepik',
            'link' => 'beans',
            'order' => 1,
            'catalog_level_one_id' => 12,
            'title' => 'Фасоль',
        ],
        [
            'image' => 'public/catalog/levelOne/items/grocery/images/main/sub/peas/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/soybean-seeds-on-wooden-floor-and-hemp-sacks-food-nutrition-concept_10400236.htm#query=%D0%93%D0%BE%D1%80%D0%BE%D1%85&position=6&from_view=search&track=sph">Изображение от jcomp</a> на Freepik',
            'link' => 'peas',
            'order' => 1,
            'catalog_level_one_id' => 12,
            'title' => 'Горох',
        ],
        [
            'image' => 'public/catalog/levelOne/items/grocery/images/main/sub/salt/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/salt-in-wooden-small-plate_11996046.htm#query=%D0%A1%D0%BE%D0%BB%D1%8C&position=28&from_view=search&track=sph">Изображение от jcomp</a> на Freepik',
            'link' => 'salt',
            'order' => 1,
            'catalog_level_one_id' => 12,
            'title' => 'Соль',
        ],
        [
            'image' => 'public/catalog/levelOne/items/grocery/images/main/sub/sugar/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/world-diabetes-day-sugar-in-wooden-bowl-on-dark-surface_10401423.htm#query=%D0%A1%D0%B0%D1%85%D0%B0%D1%80&position=7&from_view=search&track=sph">Изображение от jcomp</a> на Freepik',
            'link' => 'sugar',
            'order' => 1,
            'catalog_level_one_id' => 12,
            'title' => 'Сахар',
        ],
        [
            'image' => 'public/catalog/levelOne/items/grocery/images/main/sub/vegetable_oils/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/variety-of-containers-filled-with-olive-oil_5486633.htm#query=%D0%A0%D0%B0%D1%81%D1%82%D0%B8%D1%82%D0%B5%D0%BB%D1%8C%D0%BD%D1%8B%D0%B5%20%D0%BC%D0%B0%D1%81%D0%BB%D0%B0&position=3&from_view=search&track=ais">Freepik</a>',
            'link' => 'vegetable_oils',
            'order' => 1,
            'catalog_level_one_id' => 12,
            'title' => 'Растительные масла',
        ],
        [
            'image' => 'public/catalog/levelOne/items/grocery/images/main/sub/noodles/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/top-view-of-tagliatelle-pasta-as-surface_9097067.htm#query=%D0%BB%D0%B0%D0%BF%D1%88%D0%B0&position=21&from_view=search&track=sph">Изображение от stockking</a> на Freepik',
            'link' => 'noodles',
            'order' => 1,
            'catalog_level_one_id' => 12,
            'title' => 'Макароны, лапша',
        ],
        [
            'image' => 'public/catalog/levelOne/items/grocery/images/main/sub/flour/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/flour-and-wheat-on-a-wooden-flat-lay_9067500.htm#query=%D0%9C%D1%83%D0%BA%D0%B0&position=6&from_view=search&track=sph">Изображение от 8photo</a> на Freepik',
            'link' => 'flour',
            'order' => 1,
            'catalog_level_one_id' => 12,
            'title' => 'Мука',
        ],
        [
            'image' => 'public/catalog/levelOne/items/grocery/images/main/sub/other/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/top-view-raw-pasta-with-buckwheat-and-seasonings-on-brown-surface_14267256.htm#query=%D0%91%D0%B0%D0%BA%D0%B0%D0%BB%D0%B5%D1%8F&position=6&from_view=search&track=sph">Изображение от mdjaff</a> на Freepik',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 12,
            'title' => 'Остальное',
        ],










        // Орехи
        [
            'image' => 'public/catalog/levelOne/items/nuts/images/main/sub/walnut/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/fresh-walnut_6900570.htm#query=%D0%93%D1%80%D0%B5%D1%86%D0%BA%D0%B8%D0%B9%20%D0%BE%D1%80%D0%B5%D1%85&position=7&from_view=search&track=ais">Изображение от Racool_studio</a> на Freepik',
            'link' => 'walnut',
            'order' => 1,
            'catalog_level_one_id' => 13,
            'title' => 'Грецкий орех',
        ],
        [
            'image' => 'public/catalog/levelOne/items/nuts/images/main/sub/peanut/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/top-view-raw-peanuts-in-bowl-on-black-horizontal_7859316.htm#query=%D0%90%D1%80%D0%B0%D1%85%D0%B8%D1%81&position=13&from_view=search&track=sph">Изображение от 8photo</a> на Freepik',
            'link' => 'peanut',
            'order' => 1,
            'catalog_level_one_id' => 13,
            'title' => 'Арахис',
        ],
        [
            'image' => 'public/catalog/levelOne/items/nuts/images/main/sub/dried_fruits/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/top-view-of-assortment-of-dried-fruits-apricots-raisins-cherries-and-cherry-plums_8898437.htm#query=%D0%A1%D1%83%D1%85%D0%BE%D1%84%D1%80%D1%83%D0%BA%D1%82%D1%8B&position=0&from_view=search&track=sph">Изображение от stockking</a> на Freepik',
            'link' => 'dried_fruits',
            'order' => 1,
            'catalog_level_one_id' => 13,
            'title' => 'Сухофрукты',
        ],
        [
            'image' => 'public/catalog/levelOne/items/nuts/images/main/sub/seeds/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/front-view-black-sunflower-seeds-many-nut-snack-movie-oil_15916151.htm#query=%D0%A1%D0%B5%D0%BC%D0%B5%D1%87%D0%BA%D0%B8&position=0&from_view=search&track=sph">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'seeds',
            'order' => 1,
            'catalog_level_one_id' => 13,
            'title' => 'Семечки',
        ],
        [
            'image' => 'public/catalog/levelOne/items/nuts/images/main/sub/cashews/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/raw-cashews-nuts-in-bowl-on-dark-background_14742982.htm#query=%D0%9A%D0%B5%D1%88%D1%8C%D1%8E&position=2&from_view=search&track=sph">Изображение от jcomp</a> на Freepik',
            'link' => 'cashews',
            'order' => 1,
            'catalog_level_one_id' => 13,
            'title' => 'Кешью',
        ],
        [
            'image' => 'public/catalog/levelOne/items/nuts/images/main/sub/almond/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/bowl-with-almond-on-on-white-background-top-view_12985789.htm#query=%D0%9C%D0%B8%D0%BD%D0%B4%D0%B0%D0%BB%D1%8C&position=0&from_view=search&track=sph">Изображение от jcomp</a> на Freepik',
            'link' => 'almond',
            'order' => 1,
            'catalog_level_one_id' => 13,
            'title' => 'Миндаль',
        ],
        [
            'image' => 'public/catalog/levelOne/items/nuts/images/main/sub/hazelnuts/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/top-view-nuts-texure-horizontal_7201237.htm#query=%D0%A4%D1%83%D0%BD%D0%B4%D1%83%D0%BA&position=9&from_view=search&track=sph">Изображение от 8photo</a> на Freepik',
            'link' => 'hazelnuts',
            'order' => 1,
            'catalog_level_one_id' => 13,
            'title' => 'Фундук',
        ],
        [
            'image' => 'public/catalog/levelOne/items/nuts/images/main/sub/pine_nut/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/top-view-pine-seeds-with-wooden-spoon_7789476.htm#query=%D0%9A%D0%B5%D0%B4%D1%80%D0%BE%D0%B2%D1%8B%D0%B9%20%D0%BE%D1%80%D0%B5%D1%85&position=26&from_view=search&track=ais">Freepik</a>',
            'link' => 'pine_nut',
            'order' => 1,
            'catalog_level_one_id' => 13,
            'title' => 'Кедровый орех',
        ],
        [
            'image' => 'public/catalog/levelOne/items/nuts/images/main/sub/pistachios/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/close-up-of-pistachio-texture_3011236.htm#query=%D0%A4%D0%B8%D1%81%D1%82%D0%B0%D1%88%D0%BA%D0%B8&position=2&from_view=search&track=sph">Изображение от rawpixel.com</a> на Freepik',
            'link' => 'pistachios',
            'order' => 1,
            'catalog_level_one_id' => 13,
            'title' => 'Фисташки',
        ],
        [
            'image' => 'public/catalog/levelOne/items/nuts/images/main/sub/other/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/set-of-pecan-pistachios-almond-peanut-cashew-pine-nuts-and-lined-up-assorted-nuts-and-dried-fruits-in-a-mini-different-bowls_7481223.htm#query=%D0%9E%D1%80%D0%B5%D1%85%D0%B8&position=4&from_view=search&track=sph">Изображение от 8photo</a> на Freepik',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 13,
            'title' => 'Остальное',
        ],







        // Консервы
        [
            'image' => 'public/catalog/levelOne/items/preserves/images/main/sub/vegetables/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/arrangement-with-preserved-vegetables_9467569.htm#query=%D0%9A%D0%BE%D0%BD%D1%81%D0%B5%D1%80%D0%B2%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%BD%D1%8B%D0%B5%20%D0%BE%D0%B2%D0%BE%D1%89%D0%B8&position=13&from_view=search&track=ais">Freepik</a>',
            'link' => 'vegetables',
            'order' => 1,
            'catalog_level_one_id' => 14,
            'title' => 'Консервированные овощи',
        ],
        [
            'image' => 'public/catalog/levelOne/items/preserves/images/main/sub/mushrooms/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/front-view-of-mushrooms-in-glass-jar_10889935.htm#query=%D0%9A%D0%BE%D0%BD%D1%81%D0%B5%D1%80%D0%B2%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%BD%D1%8B%D0%B5%20%D0%B3%D1%80%D0%B8%D0%B1%D1%8B&position=3&from_view=search&track=ais">Freepik</a>',
            'link' => 'mushrooms',
            'order' => 1,
            'catalog_level_one_id' => 14,
            'title' => 'Консервированные грибы',
        ],
        [
            'image' => 'public/catalog/levelOne/items/preserves/images/main/sub/fruit/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/lots-of-fresh-fruit-cut-on-wooden-wall-drink-healthy-food_10377205.htm#page=2&query=%D0%9A%D0%BE%D0%BD%D1%81%D0%B5%D1%80%D0%B2%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%BD%D1%8B%D0%B5%20%D1%84%D1%80%D1%83%D0%BA%D1%82%D1%8B&position=8&from_view=search&track=ais">Изображение от pvproductions</a> на Freepik',
            'link' => 'fruit',
            'order' => 1,
            'catalog_level_one_id' => 14,
            'title' => 'Консервированные фрукты',
        ],
        [
            'image' => 'public/catalog/levelOne/items/preserves/images/main/sub/meat/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/canned-fish-in-tin-cans-salmon-tuna-mackerel-and-sprats_13340704.htm#query=%D0%9C%D1%8F%D1%81%D0%BD%D1%8B%D0%B5%20%D0%BA%D0%BE%D0%BD%D1%81%D0%B5%D1%80%D0%B2%D1%8B&position=0&from_view=search&track=ais">Изображение от azerbaijan_stockers</a> на Freepik',
            'link' => 'meat',
            'order' => 1,
            'catalog_level_one_id' => 14,
            'title' => 'Мясные и рыбные консервы',
        ],
        [
            'image' => 'public/catalog/levelOne/items/preserves/images/main/sub/jam/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/high-angle-arrangement-with-jars_8486696.htm#query=%D0%92%D0%B0%D1%80%D0%B5%D0%BD%D1%8C%D0%B5&position=1&from_view=search&track=sph">Freepik</a>',
            'link' => 'jam',
            'order' => 1,
            'catalog_level_one_id' => 14,
            'title' => 'Варенье',
        ],
        [
            'image' => 'public/catalog/levelOne/items/preserves/images/main/sub/other/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/assortment-of-berry-jams-top-view_9829533.htm#page=2&query=%D0%92%D0%B0%D1%80%D0%B5%D0%BD%D1%8C%D0%B5&position=4&from_view=search&track=sph">Изображение от azerbaijan_stockers</a> на Freepik',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 14,
            'title' => 'Остальное',
        ],








        // Грибы
        [
            'image' => 'public/catalog/levelOne/items/mushrooms/images/main/sub/champignons/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/side-view-of-fresh-mushrooms-champignon-on-wooden-board-on-white-background_8667587.htm#query=%D0%A8%D0%B0%D0%BC%D0%BF%D0%B8%D0%BD%D1%8C%D0%BE%D0%BD%D1%8B&position=2&from_view=search&track=sph">Изображение от stockking</a> на Freepik',
            'link' => 'champignons',
            'order' => 1,
            'catalog_level_one_id' => 15,
            'title' => 'Шампиньоны',
        ],
        [
            'image' => 'public/catalog/levelOne/items/mushrooms/images/main/sub/honeydew/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/closeup-shot-of-honey-mushrooms-growing-on-an-old-tree-stump_17531107.htm#query=%D0%9E%D0%BF%D1%8F%D1%82%D0%B0&position=2&from_view=search&track=sph?log-in=email">Изображение от wirestock</a> на Freepik',
            'link' => 'honeydew',
            'order' => 1,
            'catalog_level_one_id' => 15,
            'title' => 'Опята',
        ],
        [
            'image' => 'public/catalog/levelOne/items/mushrooms/images/main/sub/chanterelles/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/closeup-shot-of-yellow-mushrooms-bunch_16225306.htm#query=%D0%9B%D0%B8%D1%81%D0%B8%D1%87%D0%BA%D0%B8&position=39&from_view=search&track=sph">Изображение от wirestock</a> на Freepik',
            'link' => 'chanterelles',
            'order' => 1,
            'catalog_level_one_id' => 15,
            'title' => 'Лисички',
        ],
        [
            'image' => 'public/catalog/levelOne/items/mushrooms/images/main/sub/birch_mushroom/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/vertical-closeup-shot-of-boletus-growing-on-a-meadow_13702406.htm#query=%D0%9F%D0%BE%D0%B4%D0%B1%D0%B5%D1%80%D0%B5%D0%B7%D0%BE%D0%B2%D0%B8%D0%BA%D0%B8&position=0&from_view=search&track=sph">Изображение от wirestock</a> на Freepik',
            'link' => 'birch_mushroom',
            'order' => 1,
            'catalog_level_one_id' => 15,
            'title' => 'Подберезовики',
        ],
        [
            'image' => 'public/catalog/levelOne/items/mushrooms/images/main/sub/podosinovik/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/vertical-shot-of-a-wild-fungus-growing-in-a-forest-under-the-sunlight-with-a-blurry-surface_17234308.htm#page=3&query=%D0%B3%D1%80%D0%B8%D0%B1%D1%8B&position=26&from_view=search&track=sph">Изображение от wirestock</a> на Freepik',
            'link' => 'podosinovik',
            'order' => 1,
            'catalog_level_one_id' => 15,
            'title' => 'Подосиновики',
        ],
        [
            'image' => 'public/catalog/levelOne/items/mushrooms/images/main/sub/white/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/top-view-of-fresh-mushrooms-in-a-wicker-basket-and-cones-with-green-leaves-on-plaid-fabric_9303482.htm#page=4&query=%D0%91%D0%B5%D0%BB%D1%8B%D0%B5%20%D0%B3%D1%80%D0%B8%D0%B1%D1%8B&position=35&from_view=search&track=ais">Изображение от stockking</a> на Freepik',
            'link' => 'white',
            'order' => 1,
            'catalog_level_one_id' => 15,
            'title' => 'Белые',
        ],
        [
            'image' => 'public/catalog/levelOne/items/mushrooms/images/main/sub/buttermilk/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/front-view-yummy-cooked-mushrooms-with-greens-on-dark-space_15007176.htm#page=2&query=%D0%9C%D0%B0%D1%81%D0%BB%D1%8F%D1%82%D0%B0%20%D0%B3%D1%80%D0%B8%D0%B1%D1%8B&position=36&from_view=search&track=ais">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'buttermilk',
            'order' => 1,
            'catalog_level_one_id' => 15,
            'title' => 'Маслята',
        ],
        [
            'image' => 'public/catalog/levelOne/items/mushrooms/images/main/sub/other/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/mushroom_30806369.htm#page=4&query=%D0%93%D1%80%D0%B8%D0%B1%D1%8B&position=21&from_view=search&track=sph">Изображение от kamchatka</a> на Freepik',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 15,
            'title' => 'Остальное',
        ],









        // Вода
        [
            'image' => 'public/catalog/levelOne/items/juice/images/main/sub/water/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/glass-on-the-table_6356495.htm#query=%D0%9C%D0%B8%D0%BD%D0%B5%D1%80%D0%B0%D0%BB%D1%8C%D0%BD%D0%B0%D1%8F%20%D0%B2%D0%BE%D0%B4%D0%B0&position=24&from_view=search&track=ais">Изображение от Racool_studio</a> на Freepik',
            'link' => 'water',
            'order' => 1,
            'catalog_level_one_id' => 16,
            'title' => 'Минеральная вода',
        ],
        [
            'image' => 'public/catalog/levelOne/items/juice/images/main/sub/juice/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/colorful-juice-bottles-and-fruit-slices_4996290.htm#query=juice&position=4&from_view=search&track=sph">Freepik</a>',
            'link' => 'juice',
            'order' => 1,
            'catalog_level_one_id' => 16,
            'title' => 'Сок',
        ],
        [
            'image' => 'public/catalog/levelOne/items/juice/images/main/sub/kvass/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/sliced-roll-cake-on-wooden-board-with-cup-of-tea-on-stone-background_13964035.htm#query=%D0%9A%D0%B2%D0%B0%D1%81%20%D1%81%D1%83%D1%85%D0%B0%D1%80%D0%B8&position=35&from_view=search&track=ais">Изображение от azerbaijan_stockers</a> на Freepik',
            'link' => 'kvass',
            'order' => 1,
            'catalog_level_one_id' => 16,
            'title' => 'Квас',
        ],
        [
            'image' => 'public/catalog/levelOne/items/juice/images/main/sub/other/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/orange-juice-in-a-jar-with-oranges_5896837.htm#query=juice&position=40&from_view=search&track=sph">Изображение от jcomp</a> на Freepik',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 16,
            'title' => 'Остальное',
        ],








        // Цветы
        [
            'image' => 'public/catalog/levelOne/items/flower/images/main/sub/tulip/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/tulips-bouquet-on-pink-background-with-copyspace_3948708.htm#query=%D0%A2%D1%8E%D0%BB%D1%8C%D0%BF%D0%B0%D0%BD&position=3&from_view=search&track=sph">Изображение от denamorado</a> на Freepik',
            'link' => 'tulip',
            'order' => 1,
            'catalog_level_one_id' => 17,
            'title' => 'Тюльпан',
        ],
        [
            'image' => 'public/catalog/levelOne/items/flower/images/main/sub/iris/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/top-view-of-an-empty-picture-frame-with-dark-purple-color-iris-flowers-isolated-on-white-background-with-copy-space_8898409.htm#query=%D0%98%D1%80%D0%B8%D1%81&position=35&from_view=search&track=sph">Изображение от stockking</a> на Freepik',
            'link' => 'iris',
            'order' => 1,
            'catalog_level_one_id' => 17,
            'title' => 'Ирис',
        ],
        [
            'image' => 'public/catalog/levelOne/items/flower/images/main/sub/gerbera/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/high-angle-closeup-shot-of-beautiful-light-pink-barberton-daisies_11678215.htm#query=%D0%93%D0%B5%D1%80%D0%B1%D0%B5%D1%80%D0%B0&position=9&from_view=search&track=sph">Изображение от wirestock</a> на Freepik',
            'link' => 'gerbera',
            'order' => 1,
            'catalog_level_one_id' => 17,
            'title' => 'Гербера',
        ],
        [
            'image' => 'public/catalog/levelOne/items/flower/images/main/sub/chrysanthemum/1.jpeg',
            'image_licence_link' => 'Photo by <a href="https://unsplash.com/de/@lee_hisu?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Hisu lee</a> on <a href="https://unsplash.com/photos/AbkBVd1gbVA?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>',
            'link' => 'chrysanthemum',
            'order' => 1,
            'catalog_level_one_id' => 17,
            'title' => 'Хризантема',
        ],
        [
            'image' => 'public/catalog/levelOne/items/flower/images/main/sub/pion/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/fresh-beautiful-peony-flowers-in-a-vase_6780777.htm#page=2&query=%D0%9F%D0%B8%D0%BE%D0%BD&position=7&from_view=search&track=sph">Изображение от Racool_studio</a> на Freepik',
            'link' => 'pion',
            'order' => 1,
            'catalog_level_one_id' => 17,
            'title' => 'Пион',
        ],
        [
            'image' => 'public/catalog/levelOne/items/flower/images/main/sub/chamomile/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/lovely-daisy-with-a-shining-heart-in-spring_10480070.htm#query=%D0%A0%D0%BE%D0%BC%D0%B0%D1%88%D0%BA%D0%B0&position=16&from_view=search&track=sph">Изображение от vwalakte</a> на Freepik',
            'link' => 'chamomile',
            'order' => 1,
            'catalog_level_one_id' => 17,
            'title' => 'Ромашка',
        ],
        [
            'image' => 'public/catalog/levelOne/items/flower/images/main/sub/carnation/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/baby-s-breath-flowers-and-carnations-bouquet-on-the-corner-of-the-marble-textured-backdrop_3972534.htm#query=%D0%93%D0%B2%D0%BE%D0%B7%D0%B4%D0%B8%D0%BA%D0%B0&position=14&from_view=search&track=sph">Freepik</a>',
            'link' => 'carnation',
            'order' => 1,
            'catalog_level_one_id' => 17,
            'title' => 'Гвоздика',
        ],
        [
            'image' => 'public/catalog/levelOne/items/flower/images/main/sub/lily/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/still-life-with-flower-arrangement_25851846.htm#query=%D0%9B%D0%B8%D0%BB%D0%B8%D1%8F&position=7&from_view=search&track=sph">Freepik</a>',
            'link' => 'lily',
            'order' => 1,
            'catalog_level_one_id' => 17,
            'title' => 'Лилия',
        ],
        [
            'image' => 'public/catalog/levelOne/items/flower/images/main/sub/rose/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/flat-lay-of-beautifully-bloomed-colorful-rose-flowers_15365314.htm#query=%D0%A0%D0%BE%D0%B7%D0%B0&position=21&from_view=search&track=sph">Freepik</a>',
            'link' => 'rose',
            'order' => 1,
            'catalog_level_one_id' => 17,
            'title' => 'Роза',
        ],
        [
            'image' => 'public/catalog/levelOne/items/flower/images/main/sub/hyacinth/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/close-up-of-hyacinth-flower-plant-in-the-glass_4741297.htm#page=3&query=%D0%93%D0%B8%D0%B0%D1%86%D0%B8%D0%BD%D1%82&position=10&from_view=search&track=sph">Freepik</a>',
            'link' => 'hyacinth',
            'order' => 1,
            'catalog_level_one_id' => 17,
            'title' => 'Гиацинт',
        ],
        [
            'image' => 'public/catalog/levelOne/items/flower/images/main/sub/hydrangea/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/vertical-closeup-shot-of-pink-hydrangea-flowers-in-full-bloom_13153388.htm#query=%D0%93%D0%BE%D1%80%D1%82%D0%B5%D0%BD%D0%B7%D0%B8%D1%8F&position=5&from_view=search&track=sph">Изображение от wirestock</a> на Freepik',
            'link' => 'hydrangea',
            'order' => 1,
            'catalog_level_one_id' => 17,
            'title' => 'Гортензия',
        ],
        [
            'image' => 'public/catalog/levelOne/items/flower/images/main/sub/buttercup/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/side-view-of-pink-ranunculus-flowers-bouquet-in-glass-vase-at-flower-shop_8404567.htm#query=%D0%9B%D1%8E%D1%82%D0%B8%D0%BA&position=12&from_view=search&track=sph">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'buttercup',
            'order' => 1,
            'catalog_level_one_id' => 17,
            'title' => 'Лютик',
        ],
        [
            'image' => 'public/catalog/levelOne/items/flower/images/main/sub/mimosa/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/yellow-flower-branches-scattered-on-blue-table_4002110.htm#query=%D0%9C%D0%B8%D0%BC%D0%BE%D0%B7%D0%B0&position=20&from_view=search&track=sph">Freepik</a>',
            'link' => 'mimosa',
            'order' => 1,
            'catalog_level_one_id' => 17,
            'title' => 'Мимоза',
        ],
        [
            'image' => 'public/catalog/levelOne/items/flower/images/main/sub/lilac_bush/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/top-view-of-lilac-flowers-isolated-on-white-background-with-copy-space_8897530.htm#query=%D0%A1%D0%B8%D1%80%D0%B5%D0%BD%D1%8C&position=13&from_view=search&track=sph">Изображение от stockking</a> на Freepik',
            'link' => 'lilac_bush',
            'order' => 1,
            'catalog_level_one_id' => 17,
            'title' => 'Сирень',
        ],
        [
            'image' => 'public/catalog/levelOne/items/flower/images/main/sub/orchid/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/white-phalaenopsis-orchid-flower_1273889.htm#query=%D0%9E%D1%80%D1%85%D0%B8%D0%B4%D0%B5%D1%8F&position=30&from_view=search&track=sph">Изображение от aopsan</a> на Freepik',
            'link' => 'orchid',
            'order' => 1,
            'catalog_level_one_id' => 17,
            'title' => 'Орхидея',
        ],
        [
            'image' => 'public/catalog/levelOne/items/flower/images/main/sub/willow/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/white-chicken-eggs-with-willow-branches_4056688.htm#query=%D0%92%D0%B5%D1%80%D0%B1%D0%B0&position=35&from_view=search&track=sph">Freepik</a>',
            'link' => 'willow',
            'order' => 1,
            'catalog_level_one_id' => 17,
            'title' => 'Верба',
        ],
        [
            'image' => 'public/catalog/levelOne/items/flower/images/main/sub/bouquets/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/beautiful-flowers-bouquet-with-copy-space_16693869.htm#query=%D0%91%D1%83%D0%BA%D0%B5%D1%82%20%D1%86%D0%B2%D0%B5%D1%82%D0%BE%D0%B2&position=0&from_view=search&track=ais">Freepik</a>',
            'link' => 'bouquets',
            'order' => 1,
            'catalog_level_one_id' => 17,
            'title' => 'Букеты',
        ],
        [
            'image' => 'public/catalog/levelOne/items/flower/images/main/sub/other/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/top-view-of-beautifully-colored-flowers_15365221.htm#page=3&query=%D0%A6%D0%B2%D0%B5%D1%82%D1%8B&position=9&from_view=search&track=sph">Freepik</a>',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 17,
            'title' => 'Остальное',
        ],





        // Семена
        [
            'image' => 'public/catalog/levelOne/items/seeds/images/main/sub/vegetables/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/top-view-of-tomatoes-with-basket-of-veggies_9402960.htm#query=%D0%A1%D0%B5%D0%BC%D0%B5%D0%BD%D0%B0%20%D0%BE%D0%B2%D0%BE%D1%89%D0%B5%D0%B9&position=5&from_view=search&track=ais">Freepik</a>',
            'link' => 'vegetables',
            'order' => 1,
            'catalog_level_one_id' => 18,
            'title' => 'Семена овощей',
        ],
        [
            'image' => 'public/catalog/levelOne/items/seeds/images/main/sub/fruit/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/top-view-fresh-fruits-different-mellow-fruits-on-the-white-background-tree-tasty-photo-ripe-diet-color-health-berry_15298977.htm#page=2&query=%D0%A1%D0%B5%D0%BC%D0%B5%D0%BD%D0%B0%20%D1%84%D1%80%D1%83%D0%BA%D1%82%D0%BE%D0%B2&position=7&from_view=search&track=ais">Изображение от KamranAydinov</a> на Freepik',
            'link' => 'fruit',
            'order' => 1,
            'catalog_level_one_id' => 18,
            'title' => 'Семена фруктов',
        ],
        [
            'image' => 'public/catalog/levelOne/items/seeds/images/main/sub/berry/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/natural-background-with-different-wild-berries-macro-shot_31621970.htm#page=3&query=%D1%81%D0%B5%D0%BC%D0%B5%D0%BD%D0%B0%20%D1%8F%D0%B3%D0%BE%D0%B4&position=10&from_view=search&track=ais">Изображение от pvproductions</a> на Freepik',
            'link' => 'berry',
            'order' => 1,
            'catalog_level_one_id' => 18,
            'title' => 'Семена ягод',
        ],
        [
            'image' => 'public/catalog/levelOne/items/seeds/images/main/sub/nuts/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/set-of-pecan-pistachios-almond-peanut-cashew-pine-nuts-and-lined-up-assorted-nuts-and-dried-fruits-in-a-mini-different-bowls_7481223.htm#query=%D1%81%D0%B5%D0%BC%D0%B5%D0%BD%D0%B0%20%D0%BE%D1%80%D0%B5%D1%85%D0%BE%D0%B2&position=20&from_view=search&track=ais">Изображение от 8photo</a> на Freepik',
            'link' => 'nuts',
            'order' => 1,
            'catalog_level_one_id' => 18,
            'title' => 'Семена орехов',
        ],
        [
            'image' => 'public/catalog/levelOne/items/seeds/images/main/sub/tree/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/apple-orchard_11139256.htm#query=%D0%AF%D0%B1%D0%BB%D0%BE%D0%BD%D1%8F&position=1&from_view=search&track=sph">Изображение от aleksandarlittlewolf</a> на Freepik',
            'link' => 'tree',
            'order' => 1,
            'catalog_level_one_id' => 18,
            'title' => 'Семена деревьев',
        ],
        [
            'image' => 'public/catalog/levelOne/items/seeds/images/main/sub/plants/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/popular-potted-houseplants-in-white-background_17229129.htm#page=2&query=%D1%80%D0%B0%D1%81%D1%82%D0%B5%D0%BD%D0%B8%D1%8F&position=49&from_view=search&track=sph">Изображение от rawpixel.com</a> на Freepik',
            'link' => 'plants',
            'order' => 1,
            'catalog_level_one_id' => 18,
            'title' => 'Семена растений',
        ],
        [
            'image' => 'public/catalog/levelOne/items/seeds/images/main/sub/flower/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/background-of-red-tulip-in-a-yellow-tulip-field_10074889.htm#query=%D0%A1%D0%B5%D0%BC%D0%B5%D0%BD%D0%B0%20%D1%82%D1%8E%D0%BB%D1%8C%D0%BF%D0%B0%D0%BD%D0%BE%D0%B2&position=25&from_view=search&track=ais">Изображение от wirestock</a> на Freepik',
            'link' => 'flower',
            'order' => 1,
            'catalog_level_one_id' => 18,
            'title' => 'Семена цветов',
        ],
        [
            'image' => 'public/catalog/levelOne/items/seeds/images/main/sub/other/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/close-up-picture-of-hand-holding-planting-the-seed-of-the-plant_10992195.htm#query=%D0%A1%D0%B5%D0%BC%D0%B5%D0%BD%D0%B0&position=0&from_view=search&track=sph">Изображение от jcomp</a> на Freepik',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 18,
            'title' => 'Остальное',
        ],








        // Саженцы
        [
            'image' => 'public/catalog/levelOne/items/seedlings/images/main/sub/vegetables/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/top-view-gardening-tools-and-flower-pot_13560863.htm#query=vegetable%20seedlings&position=2&from_view=search&track=ais">Freepik</a>',
            'link' => 'vegetables',
            'order' => 1,
            'catalog_level_one_id' => 19,
            'title' => 'Саженцы овощей',
        ],
        [
            'image' => 'public/catalog/levelOne/items/seedlings/images/main/sub/fruit/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/seedlings-in-the-planting-tray_8352258.htm#query=vegetable%20seedlings&position=0&from_view=search&track=ais">Изображение от jcomp</a> на Freepik',
            'link' => 'fruit',
            'order' => 1,
            'catalog_level_one_id' => 19,
            'title' => 'Саженцы фруктов',
        ],
        [
            'image' => 'public/catalog/levelOne/items/seedlings/images/main/sub/berry/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/selective-focus-shot-of-a-group-of-green-sprouts-growing-out-from-the-soil_13061705.htm#query=vegetable%20seedlings&position=21&from_view=search&track=ais">Изображение от wirestock</a> на Freepik',
            'link' => 'berry',
            'order' => 1,
            'catalog_level_one_id' => 19,
            'title' => 'Саженцы ягод',
        ],
        [
            'image' => 'public/catalog/levelOne/items/seedlings/images/main/sub/nuts/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/high-angle-of-plants-in-black-pots_5375644.htm#query=vegetable%20seedlings&position=18&from_view=search&track=ais">Freepik</a>',
            'link' => 'nuts',
            'order' => 1,
            'catalog_level_one_id' => 19,
            'title' => 'Саженцы орехов',
        ],
        [
            'image' => 'public/catalog/levelOne/items/seedlings/images/main/sub/flower/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/greenery-potted-plants-gardening-nature_2861791.htm#query=vegetable%20seedlings&position=33&from_view=search&track=ais">Изображение от rawpixel.com</a> на Freepik',
            'link' => 'flower',
            'order' => 1,
            'catalog_level_one_id' => 19,
            'title' => 'Саженцы цветов',
        ],
        [
            'image' => 'public/catalog/levelOne/items/seedlings/images/main/sub/tree/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/seedlings-in-the-planting-tray_8352258.htm#query=vegetable%20seedlings&position=0&from_view=search&track=ais">Изображение от jcomp</a> на Freepik',
            'link' => 'tree',
            'order' => 1,
            'catalog_level_one_id' => 19,
            'title' => 'Саженцы деревьев',
        ],
        [
            'image' => 'public/catalog/levelOne/items/seedlings/images/main/sub/plants/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/seedlings-with-garden-tools_27544768.htm#query=vegetable%20seedlings&position=1&from_view=search&track=ais">Изображение от Tatiana Goskova</a> на Freepik',
            'link' => 'plants',
            'order' => 1,
            'catalog_level_one_id' => 19,
            'title' => 'Саженцы растений',
        ],
        [
            'image' => 'public/catalog/levelOne/items/seedlings/images/main/sub/other/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/closeup-of-sprouted-arugula-grow-on-wet-linen-mat_9129919.htm#query=vegetable%20seedlings&position=31&from_view=search&track=ais">Изображение от devmaryna</a> на Freepik',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 19,
            'title' => 'Остальное',
        ],






        // Растения
        [
            'image' => 'public/catalog/levelOne/items/plants/images/main/sub/home/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/beautiful-interior-design-with-monstera-plant_25628615.htm#query=plants%20home&position=2&from_view=search&track=ais">Freepik</a>',
            'link' => 'home',
            'order' => 1,
            'catalog_level_one_id' => 20,
            'title' => 'Комнатные',
        ],
        [
            'image' => 'public/catalog/levelOne/items/plants/images/main/sub/decorative/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/palm-tree-house-plant-in-a-pot_17206830.htm#query=plants%20decorative&position=29&from_view=search&track=ais">Изображение от rawpixel.com</a> на Freepik',
            'link' => 'decorative',
            'order' => 1,
            'catalog_level_one_id' => 20,
            'title' => 'Декоративные',
        ],
        [
            'image' => 'public/catalog/levelOne/items/plants/images/main/sub/garden/1.jpeg',
            'image_licence_link' => 'Изображение от <a href="https://ru.freepik.com/free-photo/plants-pot-with-watering-can_13238967.htm#query=plants%20garden&position=3&from_view=search&track=ais">Freepik</a>',
            'link' => 'garden',
            'order' => 1,
            'catalog_level_one_id' => 20,
            'title' => 'Садовые',
        ],
        [
            'image' => 'public/catalog/levelOne/items/plants/images/main/sub/other/1.jpeg',
            'image_licence_link' => '<a href="https://ru.freepik.com/free-photo/closeup-shot-of-the-small-green-leaves-of-a-bush_13153498.htm#query=plants&position=47&from_view=search&track=sph">Изображение от wirestock</a> на Freepik',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 20,
            'title' => 'Остальное',
        ],







        // Животноводство
        [
            'image' => 'public/catalog/levelOne/items/plants/images/main/sub/other/1.jpeg',
            'image_licence_link' => '',
            'link' => 'beef',
            'order' => 1,
            'catalog_level_one_id' => 21,
            'title' => 'Коровы',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/2/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'chicken',
            'order' => 1,
            'catalog_level_one_id' => 21,
            'title' => 'Курицы',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/2/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'turkey',
            'order' => 1,
            'catalog_level_one_id' => 21,
            'title' => 'Индейки',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/2/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'pork',
            'order' => 1,
            'catalog_level_one_id' => 21,
            'title' => 'Свиньи',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/2/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'sheep',
            'order' => 1,
            'catalog_level_one_id' => 21,
            'title' => 'Овцы',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/2/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'rabbit',
            'order' => 1,
            'catalog_level_one_id' => 21,
            'title' => 'Кролики',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/2/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'goat',
            'order' => 1,
            'catalog_level_one_id' => 21,
            'title' => 'Козлы',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/2/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'moose',
            'order' => 1,
            'catalog_level_one_id' => 21,
            'title' => 'Пушные животные',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/2/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'fish',
            'order' => 1,
            'catalog_level_one_id' => 21,
            'title' => 'Рыба',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/1/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'beef',
            'order' => 1,
            'catalog_level_one_id' => 21,
            'title' => 'Пчелы',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/0/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 21,
            'title' => 'Остальное',
        ],









        // Дрова, сено, удобрения
        [
            'image' => 'public/catalog/levelTwo/items/1/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 22,
            'title' => 'Дрова',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/1/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 22,
            'title' => 'Сено',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/1/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 22,
            'title' => 'Навоз',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/1/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 22,
            'title' => 'Кругляк',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/1/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 22,
            'title' => 'Пиломатериалы',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/0/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 22,
            'title' => 'Остальное',
        ],







        // Эко туризм
        [
            'image' => 'public/catalog/levelTwo/items/1/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 23,
            'title' => 'Эко туризм',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/0/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 23,
            'title' => 'Остальное',
        ],





        // Одежда
        [
            'image' => 'public/catalog/levelTwo/items/1/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 24,
            'title' => 'Национальные головные уборы',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/1/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 24,
            'title' => 'Национальная одежда',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/1/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 24,
            'title' => 'Национальная обувь',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/1/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 24,
            'title' => 'Национальные костюмы',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/1/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => '',
            'order' => 1,
            'catalog_level_one_id' => 24,
            'title' => 'Национальные сувениры',
        ],
        [
            'image' => 'public/catalog/levelTwo/items/0/images/main/1.jpg',
            'image_licence_link' => '',
            'link' => 'other',
            'order' => 999,
            'catalog_level_one_id' => 24,
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
