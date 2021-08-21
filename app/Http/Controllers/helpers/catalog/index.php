<?php

use App\Models\Catalog;
use App\Models\City;
use App\Models\Offer;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

function getCatalog()
{
    return Catalog::all()->toArray();
}

function getCatalogBreadcrumbsLevel2($catalogFull, $catalogLevel2Link)
{
    $breadcrumbs = [
        [
            'active' => false,
            'link' => '/',
            'title' => 'Каталог',
        ],
    ];
    $catalogLevel2 = getCatalogLevel2($catalogFull, $catalogLevel2Link);
    array_push($breadcrumbs, [
        'active' => true,
        'title' => $catalogLevel2['title'],
    ]);

    return $breadcrumbs;
}

function getCatalogFormatted($catalog)
{
    return array_reduce(
        $catalog,
        function ($acc, $catalogItem) use ($catalog) {
            $catalogItemNew = getNewArray($catalogItem);
            if ($catalogItemNew['level'] === 1) {
                $title = $catalogItemNew['title'];
                $categoriesList = array_filter($catalog, function ($item) use ($catalogItemNew) {
                    return $item['previous_level_id'] === $catalogItemNew['id'];
                });
                $categoriesListFormatted = array_map(function ($item) {
                    return [
                        'id' => $item['id'],
                        'image' => $item['image'],
                        'link' => $item['link'],
                        'linkFull' => $item['linkFull'],
                        'previousLevelId' => $item['previous_level_id'],
                        'title' => $item['title'],
                    ];
                }, $categoriesList);

                array_push(
                    $acc,
                    [
                        'content' => [
                            'categoriesList' => array_values($categoriesListFormatted),
                            'title' => $title,
                        ],
                        'id' => $catalogItemNew['id'],
                        'image' => $catalogItemNew['image'],
                        'link' => $catalogItemNew['link'],
                        'linkFull' => $catalogItemNew['linkFull'],
                        'title' => $title,
                    ]
                );
            }

            return $acc;
        },
        []
    );
}

function getCatalogFull()
{
    $catalog = getCatalog();
    $catalogFormattedLinks = setCatalogFullLinks($catalog);

    return getCatalogFormatted($catalogFormattedLinks);
}

function getCatalogLevel2($catalogFull, $link)
{
    $catalogItem = array_merge(...array_filter($catalogFull, function ($item) use ($link) {
        return $item['link'] === $link;
    }));
    $catalogItemId = $catalogItem['id'];

    return array_merge(...array_filter($catalogFull, function ($item) use ($catalogItemId) {
        return $item['id'] === $catalogItemId;
    }));
}

function getCatalogLevel2CategoriesList($catalogFull, $link)
{
    $catalogLevel2 = getCatalogLevel2($catalogFull, $link);

    return $catalogLevel2['content']['categoriesList'];
}

function getNewArray($arr)
{
    return array_combine(array_keys($arr), array_values($arr));
}

function getOfferBreadcrumbs()
{
    return [];
}

function getOffers($productLink, $searchCountry, $searchRegion, $searchCity)
{
    $catalogProduct = array_merge(...Catalog::where(['link' => $productLink, 'level' => 2])->get()->toArray());
    $offers = Offer::where(['catalog_id' => $catalogProduct['id'], 'country_id' => $searchCountry, 'region_id' => $searchRegion, 'city_id' => $searchCity],)->with('catalog', 'seller', 'seller.region', 'measure')->get()->toArray();

    return setupOffers($offers);
}

function getCatalogOffersBreadcrumbs($catalogFull, $catalogLevel2Link, $productLink)
{
    $breadcrumbs = [
        [
            'active' => false,
            'link' => '/',
            'title' => 'Каталог',
        ],
    ];

    $catalogLevel2Item = array_merge(...array_filter(
        $catalogFull,
        function ($item) use ($catalogLevel2Link) {
            return $item['link'] === $catalogLevel2Link;
        }
    ));

    $catalogProduct = array_merge(...array_filter(
        $catalogLevel2Item['content']['categoriesList'],
        function ($item) use ($catalogLevel2Item, $productLink) {
            return $item['previousLevelId'] === $catalogLevel2Item['id'] && $item['link'] === $productLink;
        }
    ));

    array_push($breadcrumbs,
        [
            'active' => false,
            'link' => '/' . 'catalog' . '/' . $catalogLevel2Item['link'],
            'title' => $catalogLevel2Item['title'],
        ],
        [
            'active' => true,
            'link' => '/' . 'catalog' . '/' . $catalogLevel2Item['link'] . '/' . $catalogProduct['link'],
            'title' => $catalogProduct['title'],
        ]
    );

    return $breadcrumbs;
}

function getOffer($id)
{
    $offer = array_merge(...Offer::where('id', $id)->get()->toArray());

    return setupOffer($offer);
}

function setCatalogFullLinks($catalog)
{
    return array_map(
        function ($catalogItem) use ($catalog) {
            $catalogItemNew = getNewArray($catalogItem);
            if ($catalogItemNew['level'] === 1) {
                $catalogItemNew['linkFull'] = '/' . 'catalog' . '/' . $catalogItemNew['link'];
            } elseif ($catalogItemNew['level'] === 2) {
                $previousLevelId = $catalogItemNew['previous_level_id'];
                $previousLevelItemIndex = array_search($previousLevelId, array_column($catalog, 'id'));
                $previousLevelItem = $catalog[$previousLevelItemIndex];

                $catalogItemNew['linkFull'] = '/' . 'catalog' . '/' . $previousLevelItem['link'] . '/' . $catalogItemNew['link'];
            }

            return $catalogItemNew;
        },
        $catalog
    );
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

function getOrganizationDataFormatted() {
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

function getSalePointsDataFormatted() {
    $authUser = Auth::user();
    $user_id = $authUser->id;

    $organization = getUserOrganization($user_id);
    $organizationFormatted = array_merge(...$organization);
    $salePointsList = $organizationFormatted['sale_points'];
    $salePointsFormatted = [];

    foreach($salePointsList as $value) {
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

    $salePointsDefaultList = array_fill(0, 15, $salePointDefaultData);

    foreach($salePointsDefaultList as $key => $value) {
        $number = $key + 1;
        $isSalePointExists = array_key_exists($number, $salePointsFormatted);

        if($isSalePointExists) {
            $salePointsDefaultList[$key] = $salePointsFormatted[$number];
        } else {
            $salePointsDefaultList[$key]['number'] = $number;
        }
    }
    return $salePointsDefaultList;
}

function getUserDataFormatted()
{
    $userData = Auth::user()->getAttributes();

    return array_filter($userData, function ($key) {
        return $key === 'name'
            || $key === 'visible_email'
            || $key === 'registration_email'
            || $key === 'phone';
    }, ARRAY_FILTER_USE_KEY);
}

function getUserOrganization($id)
{
    return Organization::where('user_id', $id)->with('salePoints')->get()->toArray();
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

function setupOffers($offers)
{
    return array_map(function ($item) {
        $itemNew = getNewArray($item);
        $itemNew['offerLink'] = '/' . 'offers' . '/' . $itemNew['id'];
        return $itemNew;
    }, $offers);
}

function tryChangeOrganizationDataInDB($request)
{
    try {
        $authUser = Auth::user();

        $title = $request->input('title');
        $inn = $request->input('inn');
        $legal_address = $request->input('legal_address');
        $real_address = $request->input('real_address');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $user_id = $authUser->id;

        $newOrganization = new Organization([
            'title' => $title,
            'inn' => $inn,
            'legal_address' => $legal_address,
            'real_address' => $real_address,
            'email' => $email,
            'phone' => $phone,
            'user_id' => $user_id,
        ]);
        $newOrganization->save();

        return true;
    } catch (\Exception $error) {
        dd($error);
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

        $authUser = Auth::user();
        $authUser->name = $name;
        $authUser->phone = $phone;
        $authUser->visible_email = $visible_email;
        $authUser->save();

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
