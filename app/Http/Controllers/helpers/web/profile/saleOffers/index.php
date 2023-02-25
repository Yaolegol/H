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
            'catalog_level_one_id' => $request->input('catalog_level_one_id'),
            'catalog_level_two_id' => $request->input('catalog_level_two_id'),
            'description' => $request->input('description'),
            'contact_person' => $request->input('contact_person'),
            'delivery' => $delivery,
            'delivery_description' => $request->input('delivery_description'),
            'map_marker_lat' => $request->input('map_marker_lat'),
            'map_marker_lng' => $request->input('map_marker_lng'),
            'measure_id' => $request->input('measure_id'),
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

function DB_destroySaleOfferItem($user_id, $saleOfferId) {
    $saleOffer = Offer::where([
        ['user_id', $user_id],
        ['id', $saleOfferId]
    ])->with('salePoints');

    $saleOffer->first()->salePoints()->detach();
    $saleOffer->delete();
}

function DB_getUserSaleOfferItem($userId, $saleOfferId) {
    $saleOfferItem = Offer::where([
        ['user_id', $userId],
        ['id', $saleOfferId],
    ])->with(['salePoints', 'organization'])->first()->toArray();

    return array_merge($saleOfferItem);
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

function getProfileSaleOffersValidator($request) {
    return Validator::make(
        $request->all(),
        [
            'address' => ['max:100'],
            'catalog_level_one_id' => ['required'],
            'catalog_level_two_id' => ['required'],
            'contact_person' => ['max:100'],
            'delivery_description' => ['max:100'],
            'description' => ['max:250'],
            'measure_id' => ['required'],
            'phone' => ['required', 'max:16'],
            'photo_1' => ['image', 'max:10240'],
            'photo_2' => ['image', 'max:10240'],
            'photo_3' => ['image', 'max:10240'],
            'price' => ['required', 'max:10'],
            'price_description' => ['max:250'],
            'title' => ['required', 'max:50'],
            'working_hours' => ['max:100'],
        ],
        [
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
    $userSaleOfferItemData['photoArray'] = getAssetArrayFormatted($userSaleOfferItemData, 'photo', 3);

    return $userSaleOfferItemData;
}

function getSaleOffersDataFormatted()
{
    $userSaleOffersList = DB_getUserSaleOffers();
    formatSaleOffersListItemsAssetsPath($userSaleOffersList);

    return $userSaleOffersList;
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

function STORAGE_destroySaleOfferData($user_id, $saleOfferId) {
    try {
        File::deleteDirectory(
            storage_path() .
            '/app/public/users/' .
            $user_id .
            '/offer/' .
            $saleOfferId
        );
    } catch(\Exception $err) {
        abort(500);
    }
}

function tryDestroySaleOfferDataInDB($saleOfferId)
{
    try {
        $authUser = Auth::user();
        $user_id = $authUser->id;

        STORAGE_destroySaleOfferData($user_id, $saleOfferId);
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

    $createdSalePoint = DB_createSaleOffer($request, $user_id);
    $createdSalePointData = $createdSalePoint->toArray();
    $createdSaleOfferId = $createdSalePointData['id'];
    $imagesArray = getOfferImagesData($request, $user_id, $createdSaleOfferId);
    DB_updateSaleOfferData($user_id, $createdSaleOfferId, $imagesArray);
    DB_syncSaleOfferSalePointsData($request, $createdSalePoint);

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
        'catalog_level_one_id' => $request->input('catalog_level_one_id'),
        'catalog_level_two_id' => $request->input('catalog_level_two_id'),
        'description' => $request->input('description'),
        'contact_person' => $request->input('contact_person'),
        'delivery' => $delivery,
        'delivery_description' => $request->input('delivery_description'),
        'is_approved' => false,
        'map_marker_lat' => $request->input('map_marker_lat'),
        'map_marker_lng' => $request->input('map_marker_lng'),
        'measure_id' => $request->input('measure_id'),
        'organization_id' => $request->input('organization_id'),
        'phone' => $request->input('phone'),
        'price' => $request->input('price'),
        'price_description' => $request->input('price_description'),
        'title' => $request->input('title'),
        'user_id' => $authUserId,
        'working_hours' => $request->input('working_hours'),
    ];

    $path = getSaleOfferAssetPath($saleOfferId);
    $updatedPhotoList = STORAGE_updateAssetList($authUserId, $request, 'photo', 3, $path);

    $newSaleOfferData = array_merge(
        $data,
        $updatedPhotoList,
    );

    $currentOffer = DB_updateSaleOfferData($authUserId, $saleOfferId, $newSaleOfferData);
    DB_syncSaleOfferSalePointsData($request, $currentOffer);

    return true;
}
