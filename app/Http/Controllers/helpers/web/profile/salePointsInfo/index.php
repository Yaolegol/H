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

function getSalePointItemDataFormatted($id)
{
    $userSalePointItemData = getUserSalePointItem($id);
    $userSalePointItemDataFormatted = array_merge($userSalePointItemData);

    $photoIteration = 1;
    while ($photoIteration <= 3) {
        $currentPhotoName = 'photo_' . $photoIteration;
        $currentPhotoValue = $userSalePointItemDataFormatted[$currentPhotoName];

        if ($currentPhotoValue) {
            $path = str_replace('public/', '', $currentPhotoValue);
            $userSalePointItemDataFormatted[$currentPhotoName] = '/storage/' . $path;
        }

        $photoIteration++;
    }

    return $userSalePointItemDataFormatted;
}

function getSalePointsDataFormatted()
{
    $userSalePointsList = DB_getUserSalePoints();
    formatSalePointsListItemsAssetsPath($userSalePointsList);

    return $userSalePointsList;
}

function getUserSalePointItem($id)
{
    $authUser = Auth::user();
    $user_id = $authUser->id;

    return SalePoint::where([
        ['user_id', $user_id],
        ['id', $id],
    ])->first()->toArray();
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

function tryUpdateSalePointDataInDB($request, $id) {
    try {
        $authUser = Auth::user();
        $user_id = $authUser->id;

        $title = $request->input('title') ?? '';
        $address = $request->input('address') ?? '';
        $working_hours = $request->input('working_hours') ?? '';
        $contact_person = $request->input('contact_person') ?? '';
        $phone = $request->input('phone') ?? '';
        $mapMarkerLat = $request->input('map_marker_lat');
        $mapMarkerLng = $request->input('map_marker_lng');

        $newPhotos = updateSalePointPhotos($request, $id);

        $newSalePointData = array_merge(
            [
                'title' => $title,
                'address' => $address,
                'working_hours' => $working_hours,
                'contact_person' => $contact_person,
                'phone' => $phone,
                'map_marker_lat' => $mapMarkerLat,
                'map_marker_lng' => $mapMarkerLng,
                'user_id' => $user_id,
            ],
            ...$newPhotos,
        );

        SalePoint::where([
            ['user_id', $user_id],
            ['id', $id]
        ])->update($newSalePointData);

        return true;
    } catch (\Exception $error) {
        return false;
    }
}

function updateSalePointPhotos($request, $updatingSalePointId)
{
    $authUser = Auth::user();
    $user_id = $authUser->id;
    $photosArray = [];

    $photoInputsIteration = 1;
    while ($photoInputsIteration <= 3) {
        $photoDBColumn = 'photo_' . $photoInputsIteration;
        $photo = $request->file('photo' . '_' . $photoInputsIteration) ?? '';
        if ($photo) {
            $oldPhoto = File::glob(
                storage_path() .
                '/app/public/users/' .
                $user_id .
                '/sale-point/' .
                $updatingSalePointId .
                '/photo/' .
                $photoInputsIteration .
                '*'
            );
            File::delete($oldPhoto);

            $photoName = $photoInputsIteration . '.' . $photo->extension();

            $photoPath = $photo->storeAs(
                '/public/users/1/sale-point/' . $updatingSalePointId . '/photo', $photoName
            );

            array_push($photosArray, [
                $photoDBColumn => $photoPath
            ]);
        } else {
            $isRemovePhoto = $request->has('remove_photo_' . $photoInputsIteration);

            if ($isRemovePhoto) {
                $oldPhoto = File::glob(
                    storage_path() .
                    '/app/public/users/' .
                    $user_id .
                    '/sale-point/' .
                    $updatingSalePointId .
                    '/photo/' .
                    $photoInputsIteration .
                    '*'
                );
                File::delete($oldPhoto);

                array_push($photosArray, [
                    $photoDBColumn => ''
                ]);
            }
        }

        $photoInputsIteration++;
    }

    return $photosArray;
}
