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
