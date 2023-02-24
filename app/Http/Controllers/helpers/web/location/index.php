<?php

function getProductFilterDataFormatted($catalogFull, $catalogLevelOneId, $catalogLevelTwoId) {
    $catalogLevelOneIdFormatted = (int)$catalogLevelOneId;
    $catalogLevelTwoIdFormatted = (int)$catalogLevelTwoId;

    $productFilterData = [
        'category' => [
            'title' => 'Все продукты',
        ],
    ];

    if($catalogLevelTwoId) {
        foreach ($catalogFull as $catalogLevelOneItem) {
            $catalogLevelTwoList = $catalogLevelOneItem['catalog_level_two'];

            foreach ($catalogLevelTwoList as $catalogLevelTwoItem) {
                if($catalogLevelTwoItem['id'] === $catalogLevelTwoIdFormatted) {
                    $productFilterData['category']['title'] = $catalogLevelTwoItem['title'];
                }
            }
        }
    } elseif($catalogLevelOneId) {
        foreach ($catalogFull as $catalogLevelOneItem) {
            if($catalogLevelOneItem['id'] === $catalogLevelOneIdFormatted) {
                $productFilterData['category']['title'] = $catalogLevelOneItem['title'];
            }
        }
    }

    return $productFilterData;
}
