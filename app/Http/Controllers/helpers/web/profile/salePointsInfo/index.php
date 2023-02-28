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

function DB_destroySalePointItem($userId, $salePointId) {
    try {
        $salePoint = SalePoint::where([
            ['user_id', $userId],
            ['id', $salePointId]
        ])->with('offers');

        $salePoint->first()->offers()->detach();
        $salePoint->delete();
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
            'agreement' => ['accepted'],
            'title' => ['required', 'max:50'],
            'address' => ['required', 'max:100'],
            'working_hours' => ['max:100'],
            'contact_person' => ['max:100'],
            'phone' => ['max:16'],
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

function STORAGE_destroySalePointData($userId, $salePointId) {
    try {
        File::deleteDirectory(
            storage_path() .
            '/app/public/users/' .
            $userId .
            '/sale-point/' .
            $salePointId
        );
    } catch(\Exception $err) {
        abort(500);
    }
}

function tryDestroySalePointDataInDB($salePointId)
{
    $authUser = Auth::user();
    $user_id = $authUser->id;

    STORAGE_destroySalePointData($user_id, $salePointId);
    DB_destroySalePointItem($user_id, $salePointId);

    return true;
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
            'is_approved' => false,
            'approved_error_message' => null,
        ];

        $path = getSalePointAssetPath($salePointId);
        $updatedPhotoList = STORAGE_updateAssetList($user_id, $request, 'photo', 3, $path);

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
