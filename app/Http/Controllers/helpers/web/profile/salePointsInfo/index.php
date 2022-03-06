<?php

use App\Models\SalePoint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

function DB_createSalePoint($request, $userId) {
    try {
        $data = [
            'title' => $request->input('title') ?? '',
            'address' => $request->input('address') ?? '',
            'working_hours' => $request->input('working_hours') ?? '',
            'contact_person' => $request->input('contact_person') ?? '',
            'phone' => $request->input('phone') ?? '',
            'map_marker_lat' => $request->input('map_marker_lat'),
            'map_marker_lng' => $request->input('map_marker_lng'),
            'user_id' => $userId,
        ];

        return SalePoint::create($data)->toArray();
    } catch(\Exception $error) {
        return abort(500);
    }
}

function DB_getUserSalePointItem($userId, $salePointId) {
    try {
        $salePoint = SalePoint::where([
            ['user_id', $userId],
            ['id', $salePointId],
        ])->get()->toArray();

        return array_merge(...$salePoint);
    } catch(\Exception $error) {
        return abort(500);
    }
}

function DB_getUserSalePoints()
{
    try {
        $authUser = Auth::user();
        $authUserId = $authUser->id;

        return SalePoint::where('user_id', $authUserId)->get()->toArray();
    } catch(\Exception $error) {
        return abort(500);
    }
}

function DB_updateSalePointData($userId, $salePointId, $imagesArray) {
    try {
        SalePoint::where([
            ['user_id', $userId],
            ['id', $salePointId]
        ])->update($imagesArray);
    } catch(\Exception $error) {
        abort(500);
    }
}

function getSalePointAssetPath($salePointId) {
    return 'sale-point/' . $salePointId;
}

function getSalePointImagesData($request, $userId, $salePointId) {
    $requestPhotoArray = getFilesArray($request, 'photo', 3);
    $storedPhotos = [];

    if(!empty($requestPhotoArray)) {
        $path = getSalePointAssetPath($salePointId);

        $storedPhotos = STORAGE_saveAssetList($userId, $requestPhotoArray, $path, 'photo');
    }

    return array_merge(...$storedPhotos);
}

function formatSalePointsListItemsAssetsPath(&$salePointList) {
    foreach ($salePointList as &$salePointItem) {
        $salePointItem['photoArray'] = getAssetArrayFormatted($salePointItem, 'photo', 3);
    }
}

function getSalePointItemDataFormatted($salePointId)
{
    $authUser = Auth::user();
    $userId = $authUser->id;

    $userSalePointItemData = DB_getUserSalePointItem($userId, $salePointId);
    $userSalePointItemData['photoArray'] = getAssetArrayFormatted($userSalePointItemData, 'photo', 3);

    return $userSalePointItemData;
}

function getSalePointsDataFormatted()
{
    $userSalePointsList = DB_getUserSalePoints();
    formatSalePointsListItemsAssetsPath($userSalePointsList);

    return $userSalePointsList;
}

function tryDestroySalePointDataInDB($id)
{
    try {
        $authUser = Auth::user();
        $user_id = $authUser->id;

        File::deleteDirectory(
            storage_path() .
            '/app/public/users/' .
            $user_id .
            '/sale-point/' .
            $id
        );

        $salePoint = SalePoint::where([
            ['user_id', $user_id],
            ['id', $id]
        ])->with('offers');

        $salePoint->first()->offers()->detach();
        $salePoint->delete();

        return true;
    } catch (\Exception $error) {
        return false;
    }
}

function tryStoreSalePointDataInDB($request)
{
    $authUser = Auth::user();
    $user_id = $authUser->id;

    $createdSalePointData = DB_createSalePoint($request, $user_id);
    $createdSalePointId = $createdSalePointData['id'];
    $imagesArray = getSalePointImagesData($request, $user_id, $createdSalePointId);

    DB_updateSalePointData($user_id, $createdSalePointId, $imagesArray);

    return true;
}

function tryUpdateSalePointDataInDB($request, $salePointId) {
    try {
        $authUser = Auth::user();
        $user_id = $authUser->id;

        $data = [
            'title' => $request->input('title') ?? '',
            'address' => $request->input('address') ?? '',
            'working_hours' => $request->input('working_hours') ?? '',
            'contact_person' => $request->input('contact_person') ?? '',
            'phone' => $request->input('phone') ?? '',
            'map_marker_lat' => $request->input('map_marker_lat'),
            'map_marker_lng' => $request->input('map_marker_lng'),
            'user_id' => $user_id,
        ];

        $path = getSalePointAssetPath($salePointId);
        $updatedPhotoList = STORAGE_updateAssetList($user_id, $request, 'photo', 3, $path);

        $newSalePointData = array_merge(
            $data,
            ...$updatedPhotoList,
        );

        DB_updateSalePointData($user_id, $salePointId, $newSalePointData);

        return true;
    } catch (\Exception $error) {
        return false;
    }
}
