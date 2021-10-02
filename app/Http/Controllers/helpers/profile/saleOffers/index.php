<?php

use App\Models\Offer;
use Illuminate\Support\Facades\Auth;

function getSaleOfferItemDataFormatted($id)
{
    $userSaleOfferItemData = getUserSaleOfferItem($id);
    $userSaleOfferItemDataFormatted = array_merge($userSaleOfferItemData);

    $photoIteration = 1;
    while ($photoIteration <= 3) {
        $currentPhotoName = 'photo_' . $photoIteration;
        $currentPhotoValue = $userSaleOfferItemDataFormatted[$currentPhotoName];

        if ($currentPhotoValue) {
            $path = str_replace('public/', '', $currentPhotoValue);
            $userSaleOfferItemDataFormatted[$currentPhotoName] = '/storage/' . $path;
        }

        $photoIteration++;
    }

    return $userSaleOfferItemDataFormatted;
}

function getSaleOffersDataFormatted()
{
    $userSaleOffersList = getUserSaleOffers();
    $userSaleOffersListFormatted = [];

    foreach ($userSaleOffersList as $userOfferItem) {

        $photoIteration = 1;
        while ($photoIteration <= 3) {
            $currentPhotoName = 'photo_' . $photoIteration;
            $currentPhotoValue = $userOfferItem[$currentPhotoName];

            if ($currentPhotoValue) {
                $path = str_replace('public/', '', $currentPhotoValue);
                $userOfferItem[$currentPhotoName] = '/storage/' . $path;
            }

            $photoIteration++;
        }

        array_push($userSaleOffersListFormatted, $userOfferItem);
    }

    return $userSaleOffersListFormatted;
}

function getUserSaleOfferItem($id)
{
    $authUser = Auth::user();
    $user_id = $authUser->id;

    return Offer::where([
        ['user_id', $user_id],
        ['id', $id],
    ])->first()->toArray();
}

function getUserSaleOffers()
{
    $authUser = Auth::user();
    $user_id = $authUser->id;

    return Offer::where('user_id', $user_id)->get()->toArray();
}

function trySaveSaleOfferInDB($request)
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

        $newPhotos = updateSaleOfferPhotos($request);

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
            ],
            ...$newPhotos,
        );

        Offer::create($newSaleOfferData);

        return true;
    } catch (\Exception $error) {
        dd($error);
        return false;
    }
}

function updateSaleOfferPhotos($request)
{
    $authUser = Auth::user();
    $authUserId = $authUser->id;
    $photosArray = [];

    $photoInputsIteration = 1;
    while ($photoInputsIteration <= 3) {
        $photoDBColumn = 'photo_' . $photoInputsIteration;
        $photo = $request->file('photo' . '_' . $photoInputsIteration) ?? '';
        if ($photo) {
            $photoName = time() . '_' . $photoInputsIteration . '.' . $photo->extension();

            $photoPath = $photo->storeAs(
                '/public/users/1/offer/' . 'photo', $photoName
            );

            array_push($photosArray, [
                $photoDBColumn => $photoPath
            ]);
        }

        $photoInputsIteration++;
    }

    return $photosArray;
}
