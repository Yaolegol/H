<?php

use App\Models\CatalogLevelOne;
use App\Models\City;
use App\Models\Offer;
use App\Models\Organization;
use App\Models\SalePoint;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Request;

function getCatalogLevelOne()
{
    return CatalogLevelOne::query()->with('catalogLevelTwo')->get()->toArray();
}

function getCatalogLevelTwoBreadcrumbs($catalogFull, $catalogLevelOneLink)
{
    $breadcrumbs = [
        [
            'active' => false,
            'link' => '/',
            'title' => 'Каталог',
        ],
    ];

    $catalogLevelOneItem = getCatalogLevelOneItem($catalogFull, $catalogLevelOneLink);

    array_push($breadcrumbs, [
        'active' => true,
        'title' => $catalogLevelOneItem['title'],
    ]);

    return $breadcrumbs;
}

function getCatalogFull()
{
    $catalog = getCatalogLevelOne();

    return getCatalogLevelOneWithFullLinks($catalog);
}

function getCatalogLevelOneWithFullLinks($catalog)
{
    foreach ($catalog as &$catalogLevelOneItem) {
        $catalogLevelOneItem['linkFull'] = '/catalog/' . $catalogLevelOneItem['link'];

        foreach ($catalogLevelOneItem['catalog_level_two'] as &$catalogLevelTwoItem) {
            $catalogLevelTwoItem['linkFull'] = $catalogLevelOneItem['linkFull'] . '/' . $catalogLevelTwoItem['link'];
        }
    }

    return $catalog;
}

function getCatalogLevelOneItem($catalogFull, $catalogLevelOneLink)
{
    return array_merge(...array_filter($catalogFull, function ($catalogLevelOneItem) use ($catalogLevelOneLink) {
        return $catalogLevelOneItem['link'] === $catalogLevelOneLink;
    }));
}

function getCatalogLevelTwoItem($catalogFull, $catalogLevelOneLink, $catalogLevelTwoLink)
{
    $catalogLevelOneItem = getCatalogLevelOneItem($catalogFull, $catalogLevelOneLink);

    return array_merge(...array_filter($catalogLevelOneItem['catalog_level_two'], function ($catalogLevelTwoItem) use ($catalogLevelTwoLink) {
        return $catalogLevelTwoItem['link'] === $catalogLevelTwoLink;
    }));
}

function getCatalogLevelOneItemSubcategoriesList($catalogFull, $catalogLevelOneLink)
{
    $catalogLevelOneItem = getCatalogLevelOneItem($catalogFull, $catalogLevelOneLink);

    return $catalogLevelOneItem['catalog_level_two'];
}

function getNewArray($arr)
{
    return array_combine(array_keys($arr), array_values($arr));
}

function getOfferBreadcrumbs()
{
    return [];
}

function getOffers($catalogFull, $catalogLevelOneLink, $productLink, $searchCountry, $searchRegion, $searchCity)
{
    $catalogLevelTwoItem = getCatalogLevelTwoItem($catalogFull, $catalogLevelOneLink, $productLink);
    $offers = Offer::where(['catalog_level_two_id' => $catalogLevelTwoItem['id'], 'country_id' => $searchCountry, 'region_id' => $searchRegion, 'city_id' => $searchCity],)->with('catalogLevelTwo', 'user', 'measure')->get()->toArray();

    return setOffersLink($offers);
}

function getCatalogOffersBreadcrumbs($catalogFull, $catalogLevelOneLink, $productLink)
{
    $breadcrumbs = [
        [
            'active' => false,
            'link' => '/',
            'title' => 'Каталог',
        ],
    ];

    $catalogLevelOneItem = getCatalogLevelOneItem($catalogFull, $catalogLevelOneLink);
    $catalogLevelTwoItem = getCatalogLevelTwoItem($catalogFull, $catalogLevelOneLink, $productLink);

    array_push($breadcrumbs,
        [
            'active' => false,
            'link' => $catalogLevelOneItem['linkFull'],
            'title' => $catalogLevelOneItem['title'],
        ],
        [
            'active' => true,
            'link' => $catalogLevelTwoItem['linkFull'],
            'title' => $catalogLevelTwoItem['title'],
        ]
    );

    return $breadcrumbs;
}

function getOffer($id)
{
    $offer = array_merge(...Offer::where('id', $id)->get()->toArray());

    return setupOffer($offer);
}

function getLocationList()
{
    return City::where('country_id', '1')->with('region', 'country')->get()->toArray();
}

function getLocationListFormatted()
{
    $cityList = getLocationList();

    return array_reduce($cityList, function ($acc, $city) {
        $cityNew = getNewArray($city);
        $region = $cityNew['region'];
        unset($cityNew['region']);
        $regionId = $region['id'];
        $isRegionIdExists = false;

        if ($acc !== null) {
            $isRegionIdExists = array_key_exists($regionId, $acc);
        }

        if ($isRegionIdExists) {
            array_push($acc[$regionId]['cities'], $cityNew);
        } else {
            $region['cities'] = [$cityNew];
            $acc[$regionId] = $region;
        }

        return $acc;
    });
}

function getOrganizationDataFormatted()
{
    $defaultOrganizationData = array(
        'title' => '',
        'inn' => '',
        'legal_address' => '',
        'real_address' => '',
        'email' => '',
        'phone' => '',
        'certificate_1' => '',
        'certificate_2' => '',
        'certificate_3' => '',
        'certificate_4' => '',
        'certificate_5' => '',
        'photo_1' => '',
        'photo_2' => '',
        'photo_3' => '',
    );

    $authUser = Auth::user();
    $authUserId = $authUser->id;

    $userOrganizationData = getUserOrganization($authUserId);
    $userOrganizationDataFormatted = array_merge($defaultOrganizationData, ...$userOrganizationData);

    $certificateInputsIteration = 1;
    while ($certificateInputsIteration <= 5) {
        $currentCertificateName = 'certificate_' . $certificateInputsIteration;
        $currentCertificateValue = $userOrganizationDataFormatted[$currentCertificateName];

        if ($currentCertificateValue) {
            $path = str_replace('public/', '', $currentCertificateValue);

            $userOrganizationDataFormatted[$currentCertificateName] = '/storage/' . $path;
        }

        $certificateInputsIteration++;
    }

    $photoInputsIteration = 1;
    while ($photoInputsIteration <= 3) {
        $currentPhotoName = 'photo_' . $photoInputsIteration;
        $currentPhotoValue = $userOrganizationDataFormatted[$currentPhotoName];

        if ($currentPhotoValue) {
            $path = str_replace('public/', '', $currentPhotoValue);

            $userOrganizationDataFormatted[$currentPhotoName] = '/storage/' . $path;
        }

        $photoInputsIteration++;
    }


    return $userOrganizationDataFormatted;
}

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

function getUserDataFormatted()
{
    $userData = Auth::user()->getAttributes();
    $userDataFiltered = array_filter($userData, function ($key) {
        return $key === 'avatar'
            || $key === 'name'
            || $key === 'visible_email'
            || $key === 'registration_email'
            || $key === 'phone';
    }, ARRAY_FILTER_USE_KEY);

    if ($userDataFiltered['avatar'] !== '') {
        $path = str_replace('public/', '', $userDataFiltered['avatar']);

        $userDataFiltered['avatar'] = '/storage/' . $path;
    }

    return $userDataFiltered;
}

function getUserOrganization($id)
{
    return Organization::where('user_id', $id)->get()->toArray();
}

function getUserSalePoints($id)
{
    return SalePoint::where('user_id', $id)->get()->toArray();
}

function setupOffer($offer)
{
    return [
        'id' => $offer['id'],
        "title" => $offer['title'],
        "description" => $offer['description'],
        "image" => $offer['image'],
        "price" => $offer['price'],
        "is_active" => $offer['is_active'],
    ];
}

function setOffersLink($offers)
{
    return array_map(function ($item) {
        $item['offerLink'] = '/' . 'offers' . '/' . $item['id'];
        return $item;
    }, $offers);
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

function updateOrganizationCertificates($request)
{
    $authUser = Auth::user();
    $authUserId = $authUser->id;
    $certificateArray = [];

    $certificateInputsIteration = 1;
    while ($certificateInputsIteration <= 5) {
        $certificateDBColumn = 'certificate_' . $certificateInputsIteration;
        $certificate = $request->file('certificate' . '_' . $certificateInputsIteration) ?? '';

        if ($certificate) {
            $certificateName = $authUserId . '_' . $certificateInputsIteration . '.' . $certificate->extension();

            $certificatePath = $certificate->storeAs(
                '/public/users/1/organization/certificate', $certificateName
            );

            array_push($certificateArray, [
                $certificateDBColumn => $certificatePath
            ]);
        } else {
            $remove_certificate_file_name = $request->has('remove_certificate_' . $certificateInputsIteration) ?? false;

            if ($remove_certificate_file_name) {
                $oldAvatarsArray = File::glob(storage_path() . '/app/public/users/' . $authUserId . 'organization/photo/' . $authUserId . '_' . $certificateInputsIteration . '.*');
                File::delete($oldAvatarsArray);

                array_push($certificateArray, [
                    $certificateDBColumn => ''
                ]);
            }
        }

        $certificateInputsIteration++;
    }

    return $certificateArray;
}

function updateOrganizationPhotos($request)
{
    $authUser = Auth::user();
    $authUserId = $authUser->id;
    $photosArray = [];

    $photoInputsIteration = 1;
    while ($photoInputsIteration <= 3) {
        $photoDBColumn = 'photo_' . $photoInputsIteration;
        $photo = $request->file('photo' . '_' . $photoInputsIteration) ?? '';

        if ($photo) {
            $photoName = $authUserId . '_' . $photoInputsIteration . '.' . $photo->extension();

            $photoPath = $photo->storeAs(
                '/public/users/1/organization/photo', $photoName
            );

            array_push($photosArray, [
                $photoDBColumn => $photoPath
            ]);
        } else {
            $remove_photo_file_name = $request->has('remove_photo_' . $photoInputsIteration) ?? false;

            if ($remove_photo_file_name) {
                $oldAvatarsArray = File::glob(storage_path() . '/app/public/users/' . $authUserId . 'organization/photo/' . $authUserId . '_' . $photoInputsIteration . '.*');
                File::delete($oldAvatarsArray);

                array_push($photosArray, [
                    $photoDBColumn => ''
                ]);
            }
        }

        $photoInputsIteration++;
    }

    return $photosArray;
}

function tryChangeOrganizationDataInDB($request)
{
    try {
        $authUser = Auth::user();
        $authUserId = $authUser->id;

        $title = $request->input('title') ?? '';
        $inn = $request->input('inn') ?? '';
        $legal_address = $request->input('legal_address') ?? '';
        $real_address = $request->input('real_address') ?? '';
        $email = $request->input('email') ?? '';
        $phone = $request->input('phone') ?? '';

        $newCertificates = updateOrganizationCertificates($request);
        $newPhotos = updateOrganizationPhotos($request);

        $newOrganizationData = array_merge(
            [
                'title' => $title,
                'inn' => $inn,
                'legal_address' => $legal_address,
                'real_address' => $real_address,
                'email' => $email,
                'phone' => $phone,
                'user_id' => $authUserId,
            ],
            ...$newCertificates,
            ...$newPhotos
        );

        Organization::updateOrCreate(
            ['user_id' => $authUserId],
            $newOrganizationData,
        );

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

function tryChangeUserEmailInDB($request)
{
    try {
        $newRegistrationEmail = $request->input('registration_email');

        $authUser = Auth::user();
        $authUser->registration_email = $newRegistrationEmail;
        $authUser->save();

        return true;
    } catch (\Exception $error) {
        return false;
    }
}

function tryChangeUserPasswordInDB($request)
{
    try {
        $newPassword = $request->input('password');

        $authUser = Auth::user();
        $authUser->password = Hash::make($newPassword);
        $authUser->save();

        return true;
    } catch (\Exception $error) {
        return false;
    }
}

function removeUserAvatarFromStorage($userId)
{
    $oldAvatarsArray = File::glob(storage_path() . '/app/public/users/' . $userId . '/avatar/*');
    File::delete($oldAvatarsArray);
}

function saveAuthUserAvatarInDB($avatar)
{
    $authUser = Auth::user();
    $authUserId = $authUser->id;

    $avatarName = $authUserId . '.' . $avatar->extension();
    $avatarPath = $avatar->storeAs(
        '/public/users/1/avatar', $avatarName
    );
    $authUser->avatar = $avatarPath;
}

function clearAuthUserAvatarInDB()
{
    $authUser = Auth::user();

    $authUser->avatar = '';
}

function updateUserAvatar($request)
{
    $authUser = Auth::user();
    $authUserId = $authUser->id;
    $avatar = $request->file('avatar');

    if ($avatar) {
        removeUserAvatarFromStorage($authUserId);
        saveAuthUserAvatarInDB($avatar);
    } else {
        $isRemoveAvatar = $request->has('remove_avatar');

        if ($isRemoveAvatar) {
            removeUserAvatarFromStorage($authUserId);
            clearAuthUserAvatarInDB();
        }
    }
}

function tryChangeUserPersonalDataInDB($request)
{
    try {
        $name = $request->input('name');
        $phone = $request->input('phone');
        $visible_email = $request->input('visible_email');

        $authUser = Auth::user();
        $authUser->name = $name;
        $authUser->phone = $phone;
        $authUser->visible_email = $visible_email;

        updateUserAvatar($request);

        $authUser->save();

        return true;
    } catch (\Exception $error) {
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

        $photo_1 = $request->file('photo_1');
        $photo_2 = $request->file('photo_2');
        $photo_3 = $request->file('photo_3');

        $catalog_level_two_id = $request->input('catalog_level_two_id');
        $region_id = $request->input('region_id');
        $city_id = $request->input('city_id');

        $newOffer = new Offer([
            'title' => $title,
            'description' => $description,
            'address' => $address,
            'phone' => $phone,
            'price' => $price,
            'photo_1' => $photo_1,
            'photo_2' => $photo_2,
            'photo_3' => $photo_3,
            'user_id' => $authUserId,
            'catalog_level_two_id' => $catalog_level_two_id,
            'region_id' => $region_id,
            'city_id' => $city_id,
        ]);
        $newOffer->save();

        return true;
    } catch (\Exception $error) {
        dd($error);
        return false;
    }
}

function trySaveUserInDB($request)
{
    try {
        $registration_email = $request->input('registration_email');
        $password = $request->input('password');

        $newUser = new User([
            'visible_email' => $registration_email,
            'registration_email' => $registration_email,
            'password' => Hash::make($password),
        ]);
        $newUser->save();

        return true;
    } catch (\Exception $error) {
        return false;
    }
}
