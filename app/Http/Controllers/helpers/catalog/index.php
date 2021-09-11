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

function getCatalogLevelOneWithFullLinks($catalog) {
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
    return array_merge(...array_filter($catalogFull, function($catalogLevelOneItem) use($catalogLevelOneLink) {
        return $catalogLevelOneItem['link'] === $catalogLevelOneLink;
    }));
}

function getCatalogLevelTwoItem($catalogFull, $catalogLevelOneLink, $catalogLevelTwoLink)
{
    $catalogLevelOneItem = getCatalogLevelOneItem($catalogFull, $catalogLevelOneLink);

    return array_merge(...array_filter($catalogLevelOneItem['catalog_level_two'], function($catalogLevelTwoItem) use($catalogLevelTwoLink) {
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
    );

    $authUser = Auth::user();
    $authUserId = $authUser->id;

    return array_merge($defaultOrganizationData, ...getUserOrganization($authUserId));
}

function getSalePointsDataFormatted()
{
    $authUser = Auth::user();
    $user_id = $authUser->id;

    $userSalePointsList = getUserSalePoints($user_id);
    $salePointsFormatted = [];

    foreach ($userSalePointsList as $value) {
        $number = $value['number'];
        $salePointsFormatted[$number] = $value;
    }

    $salePointDefaultData = array(
        'number' => '',
        'title' => '',
        'address' => '',
        'working_hours' => '',
        'contact_person' => '',
        'phone' => '',
    );

    $salePointsResultList = array_fill(0, 15, $salePointDefaultData);

    foreach ($salePointsResultList as $key => $value) {
        $number = $key + 1;
        $isSalePointExists = array_key_exists($number, $salePointsFormatted);

        if ($isSalePointExists) {
            $salePointsResultList[$key] = $salePointsFormatted[$number];
        } else {
            $salePointsResultList[$key]['number'] = $number;
        }
    }

    return $salePointsResultList;
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

    if($userDataFiltered['avatar'] === '') {
        $userDataFiltered['avatar'] = 'https://picsum.photos/200/300';
    } else {
        $path = str_replace('public/', '/', $userDataFiltered['avatar']);

        $userDataFiltered['avatar'] = '/storage/' . $path;
    }

    return $userDataFiltered;
}

function getUserOrganization($id)
{
    return Organization::where('user_id', $id)->get()->toArray();
}

function getUserSalePoints($id) {
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

function updateOrganizationCertificates($request) {
    $authUser = Auth::user();
    $certificateArray = [];

    $certificateInputsIteration = 1;
    while ($certificateInputsIteration <= 5) {
        $certificateDBColumn = 'certificate_' . $certificateInputsIteration;
        $certificate = $request->file('certificate' . '_' . $certificateInputsIteration) ?? '';

        if($certificate) {
            $certificateName = $authUser['id'] . '_' . '1' . '.' . $certificate->extension();

            $certificatePath = $certificate->storeAs(
                '/public/certificate', $certificateName
            );

            array_push($certificateArray, [
                $certificateDBColumn => $certificatePath
            ]);
        } else {
            $remove_certificate_file_name = $request->input('remove_certificate_' . $certificateInputsIteration) ?? '';

            if($remove_certificate_file_name) {
                $path = '/public/certificate/' . $authUser['id'] . '_' . $remove_certificate_file_name;
                Storage::delete($path);

                array_push($certificateArray, [
                    $certificateDBColumn => ''
                ]);
            }
        }

        $certificateInputsIteration++;
    }

    return $certificateArray;
}

function updateOrganizationPhotos($request) {
    $authUser = Auth::user();
    $photosArray = [];

    $photoInputsIteration = 1;
    while ($photoInputsIteration <= 3) {
        $photoDBColumn = 'photo_' . $photoInputsIteration;
        $photo = $request->file('photo' . '_' . $photoInputsIteration) ?? '';

        if($photo) {
            $photoName = $authUser['id'] . '_' . '1' . '.' . $photo->extension();

            $photoPath = $photo->storeAs(
                '/public/photo', $photoName
            );

            array_push($photosArray, [
                $photoDBColumn => $photoPath
            ]);
        } else {
            $remove_photo_file_name = $request->input('remove_photo_' . $photoInputsIteration) ?? '';

            if($remove_photo_file_name) {
                $path = '/public/photo/' . $authUser['id'] . '_' . $remove_photo_file_name;
                Storage::delete($path);

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

function tryChangeSalePointDataInDB($request)
{
    try {
        $authUser = Auth::user();
        $user_id = $authUser->id;

        $salePointNumber = $request->input('sale-point-number');
        $title = $request->input('title') ?? '';
        $address = $request->input('address') ?? '';
        $working_hours = $request->input('working_hours') ?? '';
        $contact_person = $request->input('contact_person') ?? '';
        $phone = $request->input('phone') ?? '';

        SalePoint::updateOrCreate(
            ['number' => $salePointNumber],
            [
                'number' => $salePointNumber,
                'title' => $title,
                'address' => $address,
                'working_hours' => $working_hours,
                'contact_person' => $contact_person,
                'phone' => $phone,
                'user_id' => $user_id,
            ]);

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

function tryChangeUserPersonalDataInDB($request)
{
    try {
        $name = $request->input('name');
        $phone = $request->input('phone');
        $visible_email = $request->input('visible_email');
        $avatar = $request->file('avatar');

        $authUser = Auth::user();
        $authUser->name = $name;
        $authUser->phone = $phone;
        $authUser->visible_email = $visible_email;

        $avatarName = $authUser['id'] . '.' . $avatar->extension();
        $avatarPath = $avatar->storeAs(
            '/public/avatars', $avatarName
        );
        $authUser->avatar = $avatarPath;

        $authUser->save();

        return true;
    } catch (\Exception $error) {
        return false;
    }
}

function trySaveSaleOfferInDB($request) {
    try {
        $catalog_level_two_id = $request->input('catalog_level_two_id');
        $title = $request->input('title');
        $description = $request->input('description');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $price = $request->input('price');

        $newOffer = new Offer([
            'catalog_level_two_id' => $catalog_level_two_id,
            'title' => $title,
            'description' => $description,
            'address' => $address,
            'phone' => $phone,
            'price' => $price,
        ]);
        $newOffer->save();

        return true;
    } catch (\Exception $error) {
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
