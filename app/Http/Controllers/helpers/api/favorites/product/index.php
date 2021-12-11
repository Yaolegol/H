<?php

use Illuminate\Support\Facades\Auth;

function apiAddOfferToUserFavoritesInDB() {
    try {
        $authUser = Auth::user();
        $authUser->favoritesOffers()->attach(1);

        return true;
    } catch(\Exception $err) {
        return false;
    }
}

function apiRemoveOfferFromUserFavoritesInDB() {
    try {
        $authUser = Auth::user();
        $authUser->favoritesOffers()->detach(1);

        return true;
    } catch(\Exception $err) {
        return false;
    }
}

function apiAddOfferToUserFavorites() {
    $result = apiAddOfferToUserFavoritesInDB();

    dd($result);
}

function apiRemoveOfferFromUserFavorites() {
    $result = apiRemoveOfferFromUserFavoritesInDB();

    dd($result);
}

function apiGetAllUserFavoritesProductsFormatted() {

}
