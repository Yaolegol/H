<?php

use App\Models\User;

function DB_getSeller($id) {
    try {
        $seller = User::where([
            ['id', $id],
        ])->with([
            'offers',
            'offers.catalogLevelTwo',
            'offers.catalogLevelTwo.catalogLevelOne',
            'offers.measure',
            'offers.organization',
            'offers.salePoints',
            'offers.user',
        ])->get()->toArray();

        if(empty($seller)) {
            return abort(404);
        }

        return array_merge(...$seller);
    } catch(\Exception $error) {
        return abort(500);
    }
}

function formatSellerData($sellerData) {
    if($sellerData['avatar']) {
        $sellerData['avatar'] = formatAssetPath($sellerData['avatar']);
    }

    if($sellerData['offers']) {
        $sellerData['offers'] = formatOffers($sellerData['offers']);
    }

    return $sellerData;
}

function getSellerDataFormatted($sellerId) {
    $seller = DB_getSeller($sellerId);

    return formatSellerData($seller);
}
