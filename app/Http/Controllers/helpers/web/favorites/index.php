<?php

use Illuminate\Support\Facades\Auth;

function getUserFavorites() {
    try {
        $authUser = Auth::user();

        return $authUser->favoritesOffers()->get()->toArray();
    } catch(\Exception $err) {
        return false;
    }
}

function getUserFavoritesFormatted() {
    $favoritesList = getUserFavorites();

    return formatOffers($favoritesList);
}
