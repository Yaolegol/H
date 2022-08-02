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
        ->get(['title', 'link'])
        ->toArray();
}

function apiGetUserListByTitleFromDB($title) {
    if(!$title) {
        return [];
    }

    $queryString = '%' . $title . '%';

    return User::where([
        ['name','like', $queryString],
    ])
        ->orWhereHas('organizations', function (Builder $query) use($queryString) {
            $query->where('title', 'like', $queryString);
        })
        ->with(['organizations' => function ($query) use($queryString) {
            $query->where('title', 'like', $queryString);
        }])
        ->get()
        ->toArray();
}

function apiGetSearchCommonResultFormatted($request) {
    $data = $request->input('data');
    $title = $data['title'];

    $userList = apiGetUserListByTitleFromDB($title);
    $catalogLevelOneList = apiGetCatalogLevelOneListByTitleFromDB($title);
    $catalogLevelTwoList = apiGetCatalogLevelTwoListByTitleFromDB($title);

    $usersDataList = apiGetUserLinks($userList);

    $data = [
        [
            'dataList' => $catalogLevelOneList,
            'title' => 'Категории',
        ],
        [
            'dataList' => $catalogLevelTwoList,
            'title' => 'Товары',
        ],
        [
            'dataList' => $usersDataList,
            'title' => 'Продавцы',
        ],
    ];

    return $data;
}

function apiGetUserLinks($userList) {
    return array_map(function($userData) {
        $userLink = '/sellers/' . $userData['id'];

        return [
            'link' => $userLink,
            'title' => $userData['name'],
        ];
    }, $userList);
}
