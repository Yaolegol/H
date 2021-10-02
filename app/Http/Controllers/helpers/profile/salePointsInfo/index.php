<?php

use App\Models\SalePoint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

function getSalePointsDataFormatted()
{
    $authUser = Auth::user();
    $user_id = $authUser->id;

    $userSalePointsList = getUserSalePoints($user_id);
    $userSalePointsListFormatted = [];

    foreach ($userSalePointsList as $userSalePointItem) {

        $photoIteration = 1;
        while($photoIteration <= 3) {
            $currentPhotoName = 'photo_' . $photoIteration;
            $currentPhotoValue = $userSalePointItem[$currentPhotoName];

            if($currentPhotoValue) {
                $path = str_replace('public/', '', $currentPhotoValue);
                $userSalePointItem[$currentPhotoName] = '/storage/' . $path;
            }

            $photoIteration++;
        }

        array_push($userSalePointsListFormatted, $userSalePointItem);
    }


    return $userSalePointsListFormatted;
}

function getUserSalePoints($id)
{
    return SalePoint::where('user_id', $id)->get()->toArray();
}

function tryChangeSalePointDataInDB($request)
{
    try {
        $authUser = Auth::user();
        $user_id = $authUser->id;

        $title = $request->input('title') ?? '';
        $address = $request->input('address') ?? '';
        $working_hours = $request->input('working_hours') ?? '';
        $contact_person = $request->input('contact_person') ?? '';
        $phone = $request->input('phone') ?? '';

        $newPhotos = updateSalePointPhotos($request);

        $newSalePointData = array_merge(
            [
                'title' => $title,
                'address' => $address,
                'working_hours' => $working_hours,
                'contact_person' => $contact_person,
                'phone' => $phone,
                'user_id' => $user_id,

            ],
            ...$newPhotos,
        );

        SalePoint::create($newSalePointData);

        return true;
    } catch (\Exception $error) {
        return false;
    }
}

function tryDestroySalePointDataInDB($id) {
    try {
        $authUser = Auth::user();
        $user_id = $authUser->id;

        $salePoint = SalePoint::where([
            ['user_id', '=', $user_id],
            ['id', '=', $id]
        ]);

        $salePointData = array_merge(...$salePoint->get()->toArray());

        $photoIteration = 1;
        while ($photoIteration <= 3) {
            $photoName = 'photo_' . $photoIteration;
            $photoValue = $salePointData[$photoName];
            if ($photoValue) {
                $oldAvatarsArray = File::glob(storage_path() . '/app/' . $photoValue);
                File::delete($oldAvatarsArray);
            }

            $photoIteration++;
        }

        $salePoint->delete();

        return true;
    } catch (\Exception $error) {
        return false;
    }
}

function updateSalePointPhotos($request)
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
                '/public/users/1/sale-point/' . 'photo', $photoName
            );

            array_push($photosArray, [
                $photoDBColumn => $photoPath
            ]);
        }

        $photoInputsIteration++;
    }

    return $photosArray;
}
