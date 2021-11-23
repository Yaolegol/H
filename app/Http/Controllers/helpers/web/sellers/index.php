<?php

use App\Models\User;

function formatSellerData($seller) {
    return array_merge(...$seller);
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
