<?php

use Aws\S3\S3Client;
use Illuminate\Support\Facades\File;

function formatAssetPath($path) {
    return str_replace('public/', '/images/', $path);
}

function getAssetArrayFormatted($item, $name, $count, $preserveOrder = false) {
    $assetArray = [];

    $iteration = 1;
    while ($iteration <= $count) {
        $currentName = $name . '_' . $iteration;
        $currentPath = $item[$currentName];

        if ($currentPath) {
            $url = formatAssetPath($currentPath);

            array_push($assetArray, $url);
        } else {
            if($preserveOrder) {
                array_push($assetArray, '');
            }
        }

        $iteration++;
    }

    return $assetArray;
}

function S3_STORAGE_deleteAssetByNumber($userId, $path, $number) {
    $s3 = S3_STORAGE_getS3Client();
    $s3->deleteMatchingObjects(env('AWS_S3_STORAGE__BUCKET__USERS'), $userId . '/' . $path . '/' . $number);
}

function S3_STORAGE_getS3Client() {
    return new S3Client([
        'version' => 'latest',
        'endpoint' => 'https://s3.regru.cloud',
        'region' => 'ru-central1',
    ]);
}

function S3_STORAGE_saveAsset($asset, $userId, $path, $name) {
    try {
        $s3 = S3_STORAGE_getS3Client();
        $data = $s3->upload(env('AWS_S3_STORAGE__BUCKET__USERS'), $userId . '/' . $path . '/' . $name,  file_get_contents($asset));

        return $data->get('ObjectURL');
    } catch(\Exception $err) {
        return abort(500);
    }
}

function S3_STORAGE_updateAssetList($userId, $request, $name, $count, $path) {
    try {
        $assetPathArray = [];
        $iteration = 1;

        while ($iteration <= $count) {
            $currentName = $name . '_' . $iteration;
            $currentFile = $request->file($currentName);

            if ($currentFile) {
                S3_STORAGE_deleteAssetByNumber($userId, $path, $iteration);

                $assetName = $iteration . '_' . time() . '.' . $currentFile->extension();
                $assetPath = S3_STORAGE_saveAsset($currentFile, $userId, $path, $assetName);

                $assetPathArray[$currentName] = $assetPath;
            } else {
                $isRemoveAsset = $request->has('remove' . '_' . $name . '_' . $iteration);

                if ($isRemoveAsset) {
                    S3_STORAGE_deleteAssetByNumber($userId, $path, $iteration);

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
