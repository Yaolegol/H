<?php

function getCatalog($catalogList) {
    $catalog = [];

    foreach ($catalogList as $value) {
        $catalogName = $value['catalog_first_level']['title'];
        if(!array_key_exists($catalogName, $catalog)) {
            $catalog[$catalogName] = [
                'content' => [
                    'categoriesList' => [$value],
                    'title' => $value['catalog_first_level']['title'],
                ],
                'image' => $value['catalog_first_level']['image'],
                'link' => $value['catalog_first_level']['link'],
                'title' => $value['catalog_first_level']['title'],
            ];
        } else {
            array_push($catalog[$catalogName]['content']['categoriesList'], $value);
        }
    }
    return $catalog;
}
