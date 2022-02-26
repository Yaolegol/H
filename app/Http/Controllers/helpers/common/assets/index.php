<?php

function formatAssetPath($path) {
    return str_replace('public/', '/storage/', $path);
}

function getAssetArrayFormatted($item, $name, $count) {
    $assetArray = [];

    $iteration = 1;
    while ($iteration <= $count) {
        $currentName = $name . '_' . $iteration;
        $currentPath = $item[$currentName];

        if ($currentPath) {
            $url = formatAssetPath($currentPath);

            array_push($assetArray, $url);
        }

        $iteration++;
    }

    return $assetArray;
}

function STORE_asset($asset, $userId, $path, $name) {
    try {
        return $asset->storeAs(
            '/public/users/' . $userId . '/' . $path,
            $name
        );
    } catch(\Exception $err) {
        return abort(500);
    }
}

function STORE_assetList($userId, $assetList, $path, $pathKey) {
    try {
        $pathArray = [];
        $iteration = 1;

        foreach ($assetList as $assetItem) {
            $assetName = $iteration . '.' . $assetItem->extension();
            $assetPath = STORE_asset($assetItem, $userId, $path, $assetName);

            $pathKeyName = $pathKey . '_' . $iteration;
            array_push($pathArray, [$pathKeyName => $assetPath]);

            $iteration++;
        }

        return $pathArray;
    } catch(\Exception $err) {
        return abort(500);
    }
}
