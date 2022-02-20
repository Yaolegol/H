<?php

use Illuminate\Support\Facades\Auth;

function api_DB_addOfferToUserFavorites($productId) {
    try {
        $authUser = Auth::user();
        $authUser->favoritesOffers()->syncWithoutDetaching([$productId]);

        return true;
    } catch(\Exception $err) {
        return false;
    }
}

function api_DB_getAllUserFavoritesOffers() {
    try {
        $authUser = Auth::user();

        return $authUser->favoritesOffers()->get()->toArray();
    } catch(\Exception $err) {
        return false;
    }
}

function api_DB_removeOfferFromUserFavorites($productId) {
    try {
        $authUser = Auth::user();
        $authUser->favoritesOffers()->detach($productId);

        return true;
    } catch(\Exception $err) {
        return false;
    }
}

function apiAddOfferToUserFavorites($id) {
    $result = api_DB_addOfferToUserFavorites($id);

    return $result;
}

function apiGetAllUserFavoritesProductsFormatted() {
    $result = api_DB_getAllUserFavoritesOffers();

    if($result) {
        return $result;
    } else {
        return [];
    }
}

function apiRemoveOfferFromUserFavorites($id) {
    $result = api_DB_removeOfferFromUserFavorites($id);

    return $result;
}
