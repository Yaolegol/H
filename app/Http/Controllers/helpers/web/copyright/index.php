<?php

use App\Models\CatalogLevelOne;
use App\Models\CatalogLevelTwo;

function DB_getCopyrightCatalogLevelOne() {
    try {
        return CatalogLevelOne::all()->toArray();
    } catch(\Exception $error) {
        return abort(500);
    }
}

function DB_getCopyrightCatalogLevelTwo() {
    try {
        return CatalogLevelTwo::all()->toArray();
    } catch(\Exception $error) {
        return abort(500);
    }
}

function getCopyrightImages() {
    $catalogLevelOne = DB_getCopyrightCatalogLevelOne();
    $catalogLevelTwo = DB_getCopyrightCatalogLevelTwo();
    $catalog = array_merge($catalogLevelOne, $catalogLevelTwo);

    setImages($catalog);

    return $catalog;
}

function setImages(&$catalog) {
    foreach ($catalog as &$catalogItem) {
        $catalogItem['image'] = formatAssetPath($catalogItem['image']);
    }
}
