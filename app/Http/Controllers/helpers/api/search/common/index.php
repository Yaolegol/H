<?php

use App\Models\CatalogLevelOne;
use App\Models\CatalogLevelTwo;
use App\Models\Offer;
use App\Models\User;

function apiGetCatalogLevelOneListByTitleFromDB($title) {
    if(!$title) {
        return [];
    }

    $queryString = '%' . $title . '%';

    return CatalogLevelOne::where([
        ['title','like', $queryString],
    ])
        ->get(['title', 'link'])
        ->toArray();
}

function apiGetOfferListByPhoneFromDB($title) {
    if(!$title) {
        return [];
    }

    $queryString = '%' . $title . '%';

    return Offer::where([
        ['phone','like', $queryString],
    ])
        ->get()
        ->toArray();
}

function apiGetCatalogLevelTwoListByTitleFromDB($title) {
    if(!$title) {
        return [];
    }

    $queryString = '%' . $title . '%';

    return CatalogLevelTwo::where([
        ['title','like', $queryString],
    ])
        ->with(['catalogLevelOne'])
        ->get()
        ->toArray();
}

function apiGetUserListByPhoneFromDB($title) {
    if(!$title) {
        return [];
    }

    $queryString = '%' . $title . '%';

    return User::where([
        ['phone','like', $queryString],
    ])
        ->get()
        ->toArray();
}

function apiGetSearchCommonResultFormatted($request) {
    $data = $request->input('data');
    $title = $data['title'];

    $normalizedTitle = normalizeTitle($title);

//    $offerList = apiGetOfferListByPhoneFromDB($normalizedTitle);
    $userList = apiGetUserListByPhoneFromDB($normalizedTitle);

//    $offersDataList = apiGetOfferLinks($offerList);
//    setOfferFullLinks($offersDataList);

    $usersDataList = apiGetUserLinks($userList);
    setUserFullLinks($usersDataList);

    $data = [
        [
            'dataList' => $usersDataList,
            'title' => 'Фермеры',
        ],
        [
            'dataList' => [],
            'title' => 'Товары',
        ],
    ];

    return $data;
}

function apiGetOfferLinks($offerList) {
    return array_map(function($offerData) {
        $offerLink = '/offers/' . $offerData['id'];

        return [
            'link' => $offerLink,
            'phone' => $offerData['phone'],
            'title' => $offerData['title'],
        ];
    }, $offerList);
}

function apiGetUserLinks($userList) {
    return array_map(function($userData) {
        $userLink = '/sellers/' . $userData['id'];

        return [
            'link' => $userLink,
            'phone' => '+' . $userData['phone'],
            'title' => $userData['name'],
        ];
    }, $userList);
}

function normalizeTitle($title) {
    if(!$title) {
        return '';
    }

    $normalizedTitle = $title;

    if(str_starts_with($normalizedTitle, '+')) {
        $normalizedTitle = substr($normalizedTitle, 1);
    }

    if(str_starts_with($normalizedTitle, '7')) {
        $normalizedTitle = substr($normalizedTitle, 1);
    }

    if(str_starts_with($normalizedTitle, '8')) {
        $normalizedTitle = substr($normalizedTitle, 1);
    }

    return $normalizedTitle;
}

function setOfferFullLinks(&$offerList) {
    foreach($offerList as &$offerData) {
        $offerData['linkFull'] = $offerData['link'];
    }
}

function setUserFullLinks(&$userList) {
    foreach($userList as &$userData) {
        $userData['linkFull'] = $userData['link'];
    }
}
