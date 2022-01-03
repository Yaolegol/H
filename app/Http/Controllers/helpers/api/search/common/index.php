<?php

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

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

    return apiGetUserLinks($userList);
}

function apiGetUserLinks($userList) {
    return array_map(function($userData) {
        $userLink = '/sellers/' . $userData['id'];

        $organizationsList = array_map(function($organizationData) {
            return [
                'title' => $organizationData['title'],
            ];
        }, $userData['organizations']);

        return [
            'userData' => [
                'link' => $userLink,
                'title' => $userData['name'],
            ],
            'organizationsList' => $organizationsList,
        ];
    }, $userList);
}
