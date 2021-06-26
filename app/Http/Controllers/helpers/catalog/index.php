<?php

use App\Models\CatalogSecondLevel;

function getCatalog()
{
    $catalogSecondLevel = CatalogSecondLevel::with('catalogFirstLevel')->get()->toArray();
    $catalog = [];

    foreach ($catalogSecondLevel as $value) {
        $catalogFL = $value['catalog_first_level'];
        $catalogFLName = $catalogFL['link'];
        $catalogFLLink = '/' . 'catalog' . '/' . $catalogFL['link'];

        if (!array_key_exists($catalogFLName, $catalog)) {
            $catalog[$catalogFLName] = [
                'content' => [
                    'categoriesList' => [
                        [
                            "id" => $value['id'],
                            "title" => $value['title'],
                            "link" => $catalogFLLink . '/' . $value['link'],
                            "image" => $value['image'],
                            "order" => $value['order'],
                        ],
                    ],
                    'title' => $value['catalog_first_level']['title'],
                ],
                'image' => $value['catalog_first_level']['image'],
                'link' => $catalogFLLink,
                'title' => $value['catalog_first_level']['title'],
            ];
        } else {
            array_push($catalog[$catalogFLName]['content']['categoriesList'],
                [
                    "id" => $value['id'],
                    "title" => $value['title'],
                    "link" => $catalogFLLink . '/' . $value['link'],
                    "image" => $value['image'],
                    "order" => $value['order'],
                ]
            );
        }
    }
    return $catalog;
}

function getCatalogSecondLevel($name) {
    $catalog = getCatalog();
    return $catalog[$name]['content']['categoriesList'];
}
