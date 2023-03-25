<?php

use Illuminate\Support\Facades\Auth;

require_once(app_path() . '/Http/Controllers/helpers/web/offers/index.php');

function DB_getUserFavoritesOffers() {
    try {
        $authUser = Auth::user();

        return $authUser->favoritesOffers()->get()->toArray();
    } catch(\Exception $err) {
        return abort(500);
    }
}

function getUserFavoritesOffersFormatted() {
    $favoritesOffersList = DB_getUserFavoritesOffers();

    return formatOffers($favoritesOffersList);
}
