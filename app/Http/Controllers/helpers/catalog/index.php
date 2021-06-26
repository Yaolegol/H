<?php

function getCatalog($catalogList)
{
    $catalog = [];

    foreach ($catalogList as $value) {
        $catalogFL = $value['catalog_first_level'];
        $catalogFLTitle = $catalogFL['title'];
        $catalogFLLink = 'catalog' . $catalogFL['link'];

        if (!array_key_exists($catalogFLTitle, $catalog)) {
            $catalog[$catalogFLTitle] = [
                'content' => [
                    'categoriesList' => [
                        [
                            "id" => $value['id'],
                            "title" => $value['title'],
                            "link" => $catalogFLLink . $value['link'],
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
            array_push($catalog[$catalogFLTitle]['content']['categoriesList'],
                [
                    "id" => $value['id'],
                    "title" => $value['title'],
                    "link" => $catalogFLLink . $value['link'],
                    "image" => $value['image'],
                    "order" => $value['order'],
                ]
            );
        }
    }
    return $catalog;
}
