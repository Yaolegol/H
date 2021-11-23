<?php

use App\Models\User;

function formatSellerData($seller) {
    $sellerData = array_merge(...$seller);

    if($sellerData['avatar']) {
        $path = str_replace('public/', '', $sellerData['avatar']);
        $url = '/storage/' . $path;

        $sellerData['avatar'] = $url;
    }

    return $sellerData;
}

function getSellerDataFormatted($id) {
    $seller = getSellerFromDB($id);

    return formatSellerData($seller);
}

function getSellerFromDB($id) {
    return User::where([
        ['id', $id],
    ])
        ->with(['offers'])
        ->get()
        ->toArray();
}
