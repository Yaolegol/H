<?php

use App\Models\CatalogLevelOne;
use App\Models\CatalogLevelTwo;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

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

function apiGetUserListByTitleFromDB($title) {
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

    $userList = apiGetUserListByTitleFromDB($title);
    $usersDataList = apiGetUserLinks($userList);
    setUserFullLinks($usersDataList);

    $data = [
        [
            'dataList' => $usersDataList,
            'title' => 'Фермеры',
        ],
    ];

    return $data;
}

function apiGetUserLinks($userList) {
    return array_map(function($userData) {
        $userLink = '/sellers/' . $userData['id'];

        return [
            'link' => $userLink,
            'phone' => $userData['phone'],
            'title' => $userData['name'],
        ];
    }, $userList);
}

function setUserFullLinks(&$userList) {
    foreach($userList as &$userData) {
        $userData['linkFull'] = $userData['link'];
    }
}
