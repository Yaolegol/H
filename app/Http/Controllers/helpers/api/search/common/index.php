<?php

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

function apiGetUserListFromDB($title) {
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
    $title = $request->query('title');

    return apiGetUserListFromDB($title);
}
