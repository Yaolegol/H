<?php

use App\Models\Offer;
use App\Models\SalePoint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

function createSaleOfferPhotos($request, $createdSaleOfferId)
{
    $photosArray = [];

    $photoInputsIteration = 1;
    while ($photoInputsIteration <= 3) {
        $photoDBColumn = 'photo_' . $photoInputsIteration;
        $photo = $request->file('photo' . '_' . $photoInputsIteration) ?? '';
        if ($photo) {
            $photoName = $photoInputsIteration . '.' . $photo->extension();

            $photoPath = $photo->storeAs(
                '/public/users/1/offer/' . $createdSaleOfferId . '/photo', $photoName
            );

            array_push($photosArray, [
                $photoDBColumn => $photoPath
            ]);
        }

        $photoInputsIteration++;
    }

    return array_merge(...$photosArray);
}

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

function getUserSaleOfferItem($id)
{
    $authUser = Auth::user();
    $user_id = $authUser->id;

    return Offer::where([
        ['user_id', $user_id],
        ['id', $id],
    ])->with('salePoints')->first()->toArray();
}

function getUserSaleOffers()
{
    $authUser = Auth::user();
    $user_id = $authUser->id;

    return Offer::where('user_id', $user_id)->get()->toArray();
}

function getUserSalePointsList() {
    $authUser = Auth::user();
    $user_id = $authUser->id;

    return SalePoint::where('user_id', $user_id)->get()->toArray();
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
        dd($error);
        return false;
    }
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

        $createdSaleOffer = Offer::create([
            'title' => $title,
            'description' => $description,
            'address' => $address,
            'phone' => $phone,
            'price' => $price,
            'user_id' => $authUserId,
            'catalog_level_two_id' => $catalog_level_two_id,
            'region_id' => $region_id,
            'city_id' => $city_id,
        ]);

        $createdSaleOfferData = $createdSaleOffer->toArray();
        $createdSaleOfferId = $createdSaleOfferData['id'];

        $newPhotos = createSaleOfferPhotos($request, $createdSaleOfferId);

        $newOffer = Offer::where([
            ['user_id', $authUserId],
            ['id', $createdSaleOfferId]
        ])->update($newPhotos);

        $isSalePointInputsExists = $request->has('sale-point_0');

        if($isSalePointInputsExists) {
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

            $createdSaleOffer->salePoints()->sync($salePointValuesArray);
        } else {
            $createdSaleOffer->salePoints()->detach();
        }

        return true;
    } catch (\Exception $error) {
        return false;
    }
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
            ],
            ...$newPhotos,
        );

        $currentOffer = Offer::where([
            ['user_id', $authUserId],
            ['id', $id]
        ]);
        $currentOffer->update($newSaleOfferData);

        $isSalePointInputsExists = $request->has('sale-point_0');

        if($isSalePointInputsExists) {
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
        } else {
            $currentOffer->first()->salePoints()->detach();
        }

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
