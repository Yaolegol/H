<?php

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

function apiGetUserListWithOrganizationsByTitleFromDB($title) {
    if(!$title) {
        return [];
    }

    return User::where([
        ['name','like', '%' . $title . '%'],
    ])
        ->orWhereHas('organizations', function (Builder $query) use($title) {
            $query->where('title', 'like', '%' . $title . '%');
        })
        ->with(['organizations'])
        ->get()
        ->toArray();
}

function apiGetSearchCommonResultFormatted($request) {
    $data = $request->input('data');
    $title = $data['title'];

    return apiGetUserListWithOrganizationsByTitleFromDB($title);
}
