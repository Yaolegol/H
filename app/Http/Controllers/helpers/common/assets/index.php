<?php

use Illuminate\Support\Facades\File;

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

function STORAGE_saveAsset($asset, $userId, $path, $name) {
    try {
        return $asset->storeAs(
            '/public/users/' . $userId . '/' . $path,
            $name
        );
    } catch(\Exception $err) {
        return abort(500);
    }
}

function STORAGE_saveAssetList($userId, $assetList, $path, $pathKey) {
    try {
        $pathArray = [];
        $iteration = 1;

        foreach ($assetList as $assetItem) {
            $assetName = $iteration . '.' . $assetItem->extension();
            $assetPath = STORAGE_saveAsset($assetItem, $userId, $path, $assetName);

            $pathKeyName = $pathKey . '_' . $iteration;
            array_push($pathArray, [$pathKeyName => $assetPath]);

            $iteration++;
        }

        return $pathArray;
    } catch(\Exception $err) {
        return abort(500);
    }
}

function STORAGE_updateAssetList($userId, $request, $name, $count, $path) {
    try {
        $assetPathArray = [];
        $iteration = 1;

        while ($iteration <= $count) {
            $currentName = $name . '_' . $iteration;
            $currentFile = $request->file($currentName);

            if ($currentFile) {
                $oldAssetPath = File::glob(
                    storage_path() . '/app/public/users/' . $userId . '/' . $path . '/' . $iteration . '*'
                );
                File::delete($oldAssetPath);

                $assetName = $iteration . '.' . $currentFile->extension();
                $assetPath = STORAGE_saveAsset($currentFile, $userId, $path, $assetName);

                $assetPathArray[$currentName] = $assetPath;
            } else {
                $isRemoveAsset = $request->has('remove' . '_' . $name . '_' . $iteration);

                if ($isRemoveAsset) {
                    $oldAssetPath = File::glob(
                        storage_path() . '/app/public/users/' . $userId . '/' . $path . '/' . $iteration . '*'
                    );
                    File::delete($oldAssetPath);

                    $assetPathArray[$currentName] = '';
                }
            }

            $iteration++;
        }

        return $assetPathArray;
    } catch(\Exception $err) {
        return abort(500);
    }
}
