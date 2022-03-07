<?php

use App\Models\Offer;
use App\Models\Organization;
use App\Models\SalePoint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

function DB_createSaleOffer($request, $userId) {
    try {
        $data = [
            'address' => $request->input('address'),
            'catalog_level_two_id' => $request->input('catalog_level_two_id'),
            'city_id' => $request->input('city_id'),
            'description' => $request->input('description'),
            'map_marker_lat' => $request->input('map_marker_lat'),
            'map_marker_lng' => $request->input('map_marker_lng'),
            'organization_id' => $request->input('organization_id') ?? null,
            'phone' => $request->input('phone'),
            'price' => $request->input('price'),
            'region_id' => $request->input('region_id'),
            'title' => $request->input('title'),
            'user_id' => $userId,
        ];

        return Offer::create($data);
    } catch(\Exception $error) {
        return abort(500);
    }
}

function DB_getUserSaleOfferItem($userId, $saleOfferId) {
    $saleOfferItem = Offer::where([
        ['user_id', $userId],
        ['id', $saleOfferId],
    ])->with(['salePoints', 'organization'])->first()->toArray();

    return array_merge(...$saleOfferItem);
}

function DB_getUserSaleOffers()
{
    try {
        $authUser = Auth::user();
        $user_id = $authUser->id;

        return Offer::where('user_id', $user_id)->with(
            ['organization', 'salePoints']
        )->get()->toArray();
    } catch(\Exception $error) {
        return abort(500);
    }
}

function DB_syncSaleOfferSalePointsData($request, $createdSaleOffer) {
    try {
        $salePointValuesArray = getInputsValuesArray($request, 'sale-point', 15);

        $createdSaleOffer->salePoints()->sync($salePointValuesArray);
    } catch(\Exception $error) {
        abort(500);
    }
}

function DB_updateSaleOfferData($userId, $saleOfferId, $imagesArray) {
    try {
        Offer::where([
            ['user_id', $userId],
            ['id', $saleOfferId]
        ])->update($imagesArray);
    } catch(\Exception $error) {
        abort(500);
    }
}

function formatSaleOffersListItemsAssetsPath(&$saleOffersList) {
    foreach ($saleOffersList as &$saleOffer) {
        $saleOffer['photoArray'] = getAssetArrayFormatted($saleOffer, 'photo', 3);
    }
}

function getOfferImagesData($request, $userId, $saleOfferId) {
    $requestPhotoArray = getFilesArray($request, 'photo', 3);
    $storedPhotos = [];

    if(!empty($requestPhotoArray)) {
        $path = getSalePointAssetPath($saleOfferId);

        $storedPhotos = STORAGE_saveAssetList($userId, $requestPhotoArray, $path, 'photo');
    }

    return array_merge(...$storedPhotos);
}

function getSaleOfferItemDataFormatted($saleOfferId)
{
    $authUser = Auth::user();
    $userId = $authUser->id;

    $userSaleOfferItemData = DB_getUserSaleOfferItem($userId, $saleOfferId);
    $userSaleOfferItemData['photoArray'] = getAssetArrayFormatted($userSaleOfferItemData, 'photo', 3);


    return $userSaleOfferItemData;
}

function getSaleOffersDataFormatted()
{
    $userSaleOffersList = DB_getUserSaleOffers();
    formatSaleOffersListItemsAssetsPath($userSaleOffersList);

    return $userSaleOffersList;
}

function getSaleOfferSalePointsListFormatted($saleOfferItemData) {
    $saleOfferItemSalePointsList = $saleOfferItemData['sale_points'];
    $saleOfferItemSalePointsIdList = array_map(function($saleOfferItemSalePoint) {
        return $saleOfferItemSalePoint['id'];
    }, $saleOfferItemSalePointsList);
    $userSalePointsList = getUserSalePointsList();

    foreach ($userSalePointsList as $key=>$userSalePoint) {
        $userSalePointId = $userSalePoint['id'];
        $isActive = in_array($userSalePointId, $saleOfferItemSalePointsIdList);

        if($isActive) {
            $userSalePointsList[$key]['active'] = true;
        } else {
            $userSalePointsList[$key]['active'] = false;
        }
    }

    return $userSalePointsList;
}

function getUserOrganizationsListFormatted() {
    $userOrganizations = DB_getUserOrganizationsList();

    return array_map(function($userOrganizationItem) {
        $userOrganizationItemId = $userOrganizationItem['id'];

        return [
            'id' => $userOrganizationItemId,
            'isChecked' => false,
            'title' => $userOrganizationItem['title'],
            'value' => $userOrganizationItemId,
        ];
    }, $userOrganizations);
}

function getUserOrganizationsWithSelectedList($saleOfferItemData) {
    $userOrganizations = getUserOrganizationsListFormatted();

    foreach ($userOrganizations as &$userOrganizationItem) {
        $userOrganizationItemId = $userOrganizationItem['id'];
        $saleOfferItemDataOrganizationId = $saleOfferItemData['organization_id'];

        $userOrganizationItem['isChecked'] = $userOrganizationItemId === $saleOfferItemDataOrganizationId;
    }

    return $userOrganizations;
}

function tryDestroySaleOfferDataInDB($id)
{
    try {
        $authUser = Auth::user();
        $user_id = $authUser->id;

        File::deleteDirectory(
            storage_path() .
            '/app/public/users/' .
            $user_id .
            '/offer/' .
            $id
        );

        $saleOffer = Offer::where([
            ['user_id', $user_id],
            ['id', $id]
        ])->with('salePoints');

        $saleOffer->first()->salePoints()->detach();
        $saleOffer->delete();

        return true;
    } catch (\Exception $error) {
        return false;
    }
}

function trySaveSaleOfferInDB($request)
{
    $authUser = Auth::user();
    $user_id = $authUser->id;

    $createdSalePoint = DB_createSaleOffer($request, $user_id);
    $createdSalePointData = $createdSalePoint->toArray();
    $createdSaleOfferId = $createdSalePointData['id'];
    $imagesArray = getOfferImagesData($request, $user_id, $createdSaleOfferId);
    DB_updateSaleOfferData($user_id, $createdSaleOfferId, $imagesArray);
    DB_syncSaleOfferSalePointsData($request, $createdSalePoint);

    return true;
}

function tryUpdateSaleOfferInDB($request, $id)
{
    try {
        $authUser = Auth::user();
        $authUserId = $authUser->id;

        $title = $request->input('title');
        $description = $request->input('description');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $price = $request->input('price');
        $catalog_level_two_id = $request->input('catalog_level_two_id');
        $region_id = $request->input('region_id');
        $city_id = $request->input('city_id');
        $organization_id = $request->input('organization_id');
        $mapMarkerLat = $request->input('map_marker_lat');
        $mapMarkerLng = $request->input('map_marker_lng');

        $newPhotos = updateSaleOfferPhotos($request, $id);

        $newSaleOfferData = array_merge(
            [
                'title' => $title,
                'description' => $description,
                'address' => $address,
                'phone' => $phone,
                'price' => $price,
                'user_id' => $authUserId,
                'catalog_level_two_id' => $catalog_level_two_id,
                'region_id' => $region_id,
                'city_id' => $city_id,
                'organization_id' => $organization_id,
                'map_marker_lat' => $mapMarkerLat,
                'map_marker_lng' => $mapMarkerLng,
            ],
            ...$newPhotos,
        );

        $currentOffer = Offer::where([
            ['user_id', $authUserId],
            ['id', $id]
        ]);
        $currentOffer->update($newSaleOfferData);

        $salePointValuesArray = [];

        $salePointInputIteration = 0;
        while ($salePointInputIteration < 15) {
            $salePointInputName = 'sale-point_' . $salePointInputIteration;
            $salePointInputValue = $request->input($salePointInputName);

            if($salePointInputValue) {
                array_push($salePointValuesArray, $salePointInputValue);
            }

            $salePointInputIteration++;
        }

        $currentOffer->first()->salePoints()->sync($salePointValuesArray);

        return true;
    } catch (\Exception $error) {
        dd($error);
        return false;
    }
}

function updateSaleOfferPhotos($request, $updatingSaleOfferId) {
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
                '/offer/' .
                $updatingSaleOfferId .
                '/photo/' .
                $photoInputsIteration .
                '*'
            );
            File::delete($oldPhoto);

            $photoName = $photoInputsIteration . '.' . $photo->extension();

            $photoPath = $photo->storeAs(
                '/public/users/1/offer/' . $updatingSaleOfferId . '/photo', $photoName
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
                    '/offer/' .
                    $updatingSaleOfferId .
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
