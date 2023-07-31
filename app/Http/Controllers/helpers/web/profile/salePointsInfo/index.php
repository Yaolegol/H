<?php

use App\Models\SalePoint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

function DB_createSalePoint($request, $userId) {
    try {
        $data = [
            'title' => $request->input('title') ?? '',
            'description' => $request->input('description') ?? '',
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

function DB_destroySalePointItem($userId, $salePointId) {
    try {
//        $salePoint = SalePoint::where([
//            ['user_id', $userId],
//            ['id', $salePointId],
//        ])->with('offers');
//
//        $salePoint->first()->offers()->detach();
//        $salePoint->delete();

        $salePoint = SalePoint::where([
            ['user_id', $userId],
            ['id', $salePointId],
            ['is_removed', false]
        ])->with('offers')->first();

        $salePoint->is_removed = true;
        $salePoint->save();
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

function DB_getUserSalePoints($approved = false)
{
    try {
        $authUser = Auth::user();
        $authUserId = $authUser->id;

        $filter = [
            ['user_id', $authUserId],
            ['is_removed', false],
        ];

        if($approved) {
            array_push($filter, [
                'is_approved', 1
            ]);
        }

        return SalePoint::where($filter)->get()->toArray();
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

function getProfileSalePointsValidator($request) {
    return Validator::make(
        $request->all(),
        [
            'title' => ['required', 'max:1000'],
            'address' => ['required', 'max:1000'],
            'working_hours' => ['max:1000'],
            'contact_person' => ['max:1000'],
            'phone' => ['max:30'],
            'photo_1' => ['image', 'max:10240'],
            'photo_2' => ['image', 'max:10240'],
            'photo_3' => ['image', 'max:10240'],
            'map_marker_lat' => ['required', 'max:50'],
            'map_marker_lng' => ['required', 'max:50'],
        ],
        [
            'image' => 'Поле должно содержать картинку, размером не более 10Мб',
            'max' => 'Поле должно содержать максимум :max символов',
            'required' => 'Поле обязательно для заполнения',
            'size' => 'Поле должно содержать картинку, размером не более 10Мб',
        ]
    );
}

function getSalePointAssetPath($salePointId) {
    return 'sale-point/' . $salePointId;
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
    $userSalePointItemData['photoArray'] = getAssetArrayFormatted($userSalePointItemData, 'photo', 3, true);

    return $userSalePointItemData;
}

function getSalePointsDataFormatted()
{
    $userSalePointsList = DB_getUserSalePoints();
    formatSalePointsListItemsAssetsPath($userSalePointsList);

    return $userSalePointsList;
}

function S3_STORAGE_destroySalePointData($userId, $salePointId) {
    try {
        $s3 = S3_STORAGE_getS3Client();
        $s3->deleteMatchingObjects(env('AWS_S3_STORAGE__BACKET__USERS'), $userId . '/' . 'sale-point' . '/' . $salePointId);
    } catch(\Exception $err) {
        abort(500);
    }
}

function tryDestroySalePointDataInDB($salePointId)
{
    $authUser = Auth::user();
    $user_id = $authUser->id;

    S3_STORAGE_destroySalePointData($user_id, $salePointId);
    DB_destroySalePointItem($user_id, $salePointId);

    return true;
}

function tryStoreSalePointDataInDB($request)
{
    $authUser = Auth::user();
    $user_id = $authUser->id;

    $userSalePointsList = DB_getUserSalePoints();

    if(count($userSalePointsList) >= 50) {
        return false;
    }

    $createdSalePointData = DB_createSalePoint($request, $user_id);
    $createdSalePointId = $createdSalePointData['id'];

    $path = getSalePointAssetPath($createdSalePointId);
    $updatedPhotoList = S3_STORAGE_updateAssetList($user_id, $request, 'photo', 3, $path);

    DB_updateSalePointData($user_id, $createdSalePointId, $updatedPhotoList);

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
            'is_approved' => false,
            'approved_error_message' => null,
        ];

        $path = getSalePointAssetPath($salePointId);
        $updatedPhotoList = S3_STORAGE_updateAssetList($user_id, $request, 'photo', 3, $path);

        $newSalePointData = array_merge(
            $data,
            $updatedPhotoList,
        );

        DB_updateSalePointData($user_id, $salePointId, $newSalePointData);

        return true;
    } catch (\Exception $error) {
        return false;
    }
}
