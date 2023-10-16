<?php

use App\Models\Offer;
use App\Models\Organization;
use App\Models\SalePoint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

function DB_createSaleOffer($request, $userId) {
    $deliveryRequest = $request->input('delivery');
    $delivery = $deliveryRequest == 'on' || $deliveryRequest == '1' || $deliveryRequest == 1;

    try {
        $data = [
            'address' => $request->input('address'),
            'description' => $request->input('description'),
            'contact_person' => $request->input('contact_person'),
            'delivery' => $delivery,
            'delivery_description' => $request->input('delivery_description'),
            'map_marker_lat' => $request->input('map_marker_lat'),
            'map_marker_lng' => $request->input('map_marker_lng'),
            'organization_id' => $request->input('organization_id') ?? null,
            'phone' => $request->input('phone'),
            'price' => $request->input('price'),
            'price_description' => $request->input('price_description'),
            'title' => $request->input('title'),
            'user_id' => $userId,
            'working_hours' => $request->input('working_hours'),
        ];

        return Offer::create($data);
    } catch(\Exception $error) {
        return abort(500);
    }
}

function DB_toggleOfferEnable($user_id, $saleOfferId, $isEnabled) {
    $saleOffer = Offer::where([
        ['user_id', $user_id],
        ['id', $saleOfferId],
        ['is_removed', false],
    ])->first();

    $saleOffer->is_enabled = $isEnabled;
    $saleOffer->save();
}

function DB_destroySaleOfferItem($user_id, $saleOfferId) {
//    $saleOffer = Offer::where([
//        ['user_id', $user_id],
//        ['id', $saleOfferId]
//    ])->with(['salePoints', 'usersFavorites']);
//
//    $saleOffer->first()->salePoints()->detach();
//    $saleOffer->first()->usersFavorites()->detach();
//    $saleOffer->first()->catalogLevelTwo()->detach();
//    $saleOffer->delete();

    $saleOffer = Offer::where([
        ['user_id', $user_id],
        ['id', $saleOfferId],
        ['is_removed', false],
    ])->first();

    $saleOffer->is_removed = true;
    $saleOffer->save();
}

function DB_getUserSaleOfferItem($userId, $saleOfferId) {
    $saleOfferItem = Offer::where([
        ['user_id', $userId],
        ['id', $saleOfferId],
    ])->with([
        'catalogLevelOne',
        'catalogLevelTwo',
        'salePoints',
        'organization'
    ])->first()->toArray();

    return array_merge($saleOfferItem);
}

function DB_getUserSaleOfferItemByCLO($userId, $CLOId) {
    return Offer::where([
        ['user_id', $userId],
        ['catalog_level_one_id', $CLOId],
        ['is_removed', false],
    ])->get()->first();
}

function DB_getUserSaleOffers()
{
    try {
        $authUser = Auth::user();
        $user_id = $authUser->id;

        return Offer::where([
            ['user_id', $user_id],
            ['is_removed', false],
        ])->with(
            [
                'catalogLevelOne',
                'catalogLevelTwo',
                'organization',
                'salePoints'
            ]
        )->get()->toArray();
    } catch(\Exception $error) {
        return abort(500);
    }
}

function DB_syncSaleOfferCatalogLevelOneData($request, $saleOffer) {
    $catalogLevelTwoIdsArray = getProfileSaleOffersCatalogLevelOneList($request);

    try {
        $saleOffer->catalogLevelOne()->sync($catalogLevelTwoIdsArray);
    } catch(\Exception $error) {
        abort(500);
    }
}

function DB_syncSaleOfferCatalogLevelTwoData($request, $saleOffer) {
    $catalogLevelTwoIdsArray = getProfileSaleOffersCatalogLevelTwoList($request);

    try {
        $saleOffer->catalogLevelTwo()->sync($catalogLevelTwoIdsArray);
    } catch(\Exception $error) {
        abort(500);
    }
}

function DB_syncSaleOfferSalePointsData($request, $saleOffer) {
    try {
        $salePointValuesArray = getInputsValuesArray($request, 'sale-point', 15);

        $saleOffer->salePoints()->sync($salePointValuesArray);
    } catch(\Exception $error) {
        abort(500);
    }
}

function DB_updateSaleOfferData($userId, $saleOfferId, $imagesArray) {
    try {
        $offer = Offer::where([
            ['user_id', $userId],
            ['id', $saleOfferId]
        ]);
        $offer->update($imagesArray);

        return $offer->first();
    } catch(\Exception $error) {
        abort(500);
    }
}

function checkIsCatalogLevelOneItemCreated($request, $offerId = null) {
    $authUser = Auth::user();
    $authUserId = $authUser->id;

    $CLOId = $request->input('catalog_level_one_id');

    $offer = DB_getUserSaleOfferItemByCLO($authUserId, $CLOId);

    if($offer === null) {
        return false;
    }

    if($offerId === null) {
        return true;
    }

    return (string) $offer->id !== $offerId;
}

function toggleOfferEnable($id, $isEnabled) {
    try {
        $authUser = Auth::user();
        $user_id = $authUser->id;

        DB_toggleOfferEnable($user_id, $id, $isEnabled);

        return true;
    } catch (\Exception $error) {
        return false;
    }
}

function formatSaleOffersListItemsAssetsPath(&$saleOffersList) {
    foreach ($saleOffersList as &$saleOffer) {
        $saleOffer['photoArray'] = getAssetArrayFormatted($saleOffer, 'photo', 3);
    }
}

function getProfileSaleOffersCatalogLevelOneList($request) {
    $catalogLevelOneIdsArray = [];
    foreach($request->all() as $key => $value){
        if("catalog_level_two_id" == substr($key,0,20)){
            $dataArray = explode('__', $key);
            array_push($catalogLevelOneIdsArray, $dataArray[1]);
        }
    }

    return $catalogLevelOneIdsArray;
}

function getProfileSaleOffersCatalogLevelTwoList($request) {
    $catalogLevelTwoIdsArray = [];
    foreach($request->all() as $key => $value){
        if("catalog_level_two_id" == substr($key,0,20)) {
            if($key !== 'catalog_level_two_id__999__1') {
                array_push($catalogLevelTwoIdsArray, $value);
            }
        }
    }

    return $catalogLevelTwoIdsArray;
}

function getProfileSaleOffersValidator($request) {
    return Validator::make(
        $request->all(),
        [
            'address' => ['max:1000'],
            'contact_person' => ['max:1000'],
            'delivery_description' => ['max:1000'],
            'description' => ['max:1000'],
            'phone' => ['required', 'max:30'],
            'photo_1' => ['image', 'max:10240'],
            'photo_2' => ['image', 'max:10240'],
            'photo_3' => ['image', 'max:10240'],
            'price' => ['required', 'max:1000'],
            'price_description' => ['max:1000'],
            'title' => ['required', 'max:1000'],
            'working_hours' => ['max:1000'],
        ],
        [
            'digits' => 'Поле должно содержать :digits цифр',
            'image' => 'Поле должно содержать картинку, размером не более 10Мб',
            'max' => 'Поле должно содержать максимум :max символов',
            'required' => 'Поле обязательно для заполнения',
            'size' => 'Поле должно содержать картинку, размером не более 10Мб',
        ]
    );
}

function getSaleOfferAssetPath($saleOfferId) {
    return 'sale-offer/' . $saleOfferId;
}

function getSaleOfferItemDataFormatted($saleOfferId)
{
    $authUser = Auth::user();
    $userId = $authUser->id;

    $userSaleOfferItemData = DB_getUserSaleOfferItem($userId, $saleOfferId);
    $userSaleOfferItemData['photoArray'] = getAssetArrayFormatted($userSaleOfferItemData, 'photo', 3, true);

    return $userSaleOfferItemData;
}

function getSaleOffersDataFormatted()
{
    $userSaleOffersList = DB_getUserSaleOffers();

    return formatOffers($userSaleOffersList);
}

function getSaleOfferSalePointsIdsList($saleOfferItemData) {
    $offerSalePointsList = $saleOfferItemData['sale_points'];

    return array_map(function($saleOfferItemSalePoint) {
        return $saleOfferItemSalePoint['id'];
    }, $offerSalePointsList);
}

function getSaleOfferSalePointsListFormatted($saleOfferItemData) {
    $userSalePointsList = DB_getUserSalePoints();
    setCheckedPropertyForSalePointsList($userSalePointsList, $saleOfferItemData);

    return $userSalePointsList;
}

function getUserOrganizationsListFormatted($isApproved = false) {
    $userOrganizations = DB_getUserOrganizationsList($isApproved);

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
    $userOrganizationsList = getUserOrganizationsListFormatted();
    setCheckedPropertyForOrganizationsList($userOrganizationsList, $saleOfferItemData);

    return $userOrganizationsList;
}

function setCheckedPropertyForOrganizationsList(&$userOrganizationsList, $saleOfferItemData) {
    foreach ($userOrganizationsList as &$userOrganizationItem) {
        $userOrganizationItemId = $userOrganizationItem['id'];
        $saleOfferItemDataOrganizationId = $saleOfferItemData['organization_id'];

        $userOrganizationItem['isChecked'] = $userOrganizationItemId === $saleOfferItemDataOrganizationId;
    }
}

function setCheckedPropertyForSalePointsList(&$userSalePointsList, $saleOfferItemData) {
    $offerSalePointsIdList = getSaleOfferSalePointsIdsList($saleOfferItemData);

    foreach ($userSalePointsList as &$userSalePoint) {
        $isActive = in_array($userSalePoint['id'], $offerSalePointsIdList);
        $userSalePoint['active'] = $isActive;
    }
}

function S3_STORAGE_destroySaleOfferData($user_id, $saleOfferId) {
    try {
        $s3 = S3_STORAGE_getS3Client();
        $s3->deleteMatchingObjects(env('AWS_S3_STORAGE__BUCKET__USERS'), $user_id . '/' . 'sale-offer' . '/' . $saleOfferId);
    } catch(\Exception $err) {
        abort(500);
    }
}

function tryDestroySaleOfferDataInDB($saleOfferId)
{
    try {
        $authUser = Auth::user();
        $user_id = $authUser->id;

        S3_STORAGE_destroySaleOfferData($user_id, $saleOfferId);
        DB_destroySaleOfferItem($user_id, $saleOfferId);

        return true;
    } catch (\Exception $error) {
        return false;
    }
}

function trySaveSaleOfferInDB($request)
{
    $authUser = Auth::user();
    $user_id = $authUser->id;

    $userSaleOffersList = DB_getUserSaleOffers();

    if(count($userSaleOffersList) >= 50) {
        return false;
    }

    $createdSaleOffer = DB_createSaleOffer($request, $user_id);
    $createdSalePointData = $createdSaleOffer->toArray();
    $createdSaleOfferId = $createdSalePointData['id'];

    $path = getSaleOfferAssetPath($createdSaleOfferId);
    $updatedPhotoList = S3_STORAGE_updateAssetList($user_id, $request, 'photo', 3, $path);

    DB_updateSaleOfferData($user_id, $createdSaleOfferId, $updatedPhotoList);
    DB_syncSaleOfferSalePointsData($request, $createdSaleOffer);
    DB_syncSaleOfferCatalogLevelOneData($request, $createdSaleOffer);
    DB_syncSaleOfferCatalogLevelTwoData($request, $createdSaleOffer);

    return true;
}

function tryUpdateSaleOfferInDB($request, $saleOfferId)
{
    $authUser = Auth::user();
    $authUserId = $authUser->id;

    $deliveryRequest = $request->input('delivery');
    $delivery = $deliveryRequest == 'on' || $deliveryRequest == '1' || $deliveryRequest == 1;

    $data = [
        'address' => $request->input('address'),
        'description' => $request->input('description'),
        'contact_person' => $request->input('contact_person'),
        'delivery' => $delivery,
        'delivery_description' => $request->input('delivery_description'),
        'is_approved' => false,
        'approved_error_message' => null,
        'map_marker_lat' => $request->input('map_marker_lat'),
        'map_marker_lng' => $request->input('map_marker_lng'),
        'organization_id' => $request->input('organization_id'),
        'phone' => $request->input('phone'),
        'price' => $request->input('price'),
        'price_description' => $request->input('price_description'),
        'title' => $request->input('title'),
        'user_id' => $authUserId,
        'working_hours' => $request->input('working_hours'),
    ];

    $path = getSaleOfferAssetPath($saleOfferId);
    $updatedPhotoList = S3_STORAGE_updateAssetList($authUserId, $request, 'photo', 3, $path);

    $newSaleOfferData = array_merge(
        $data,
        $updatedPhotoList,
    );

    $currentOffer = DB_updateSaleOfferData($authUserId, $saleOfferId, $newSaleOfferData);
    DB_syncSaleOfferSalePointsData($request, $currentOffer);
    DB_syncSaleOfferCatalogLevelOneData($request, $currentOffer);
    DB_syncSaleOfferCatalogLevelTwoData($request, $currentOffer);

    return true;
}
