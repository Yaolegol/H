<?php

use Illuminate\Support\Facades\Auth;

function apiAddOfferToUserFavoritesInDB($productId) {
    try {
        $authUser = Auth::user();
        $authUser->favoritesOffers()->attach($productId);

        return true;
    } catch(\Exception $err) {
        return false;
    }
}

function apiGetAllUserFavoritesOffersFromDB() {
    try {
        $authUser = Auth::user();

        return $authUser->favoritesOffers()->get()->toArray();
    } catch(\Exception $err) {
        return false;
    }
}

function apiRemoveOfferFromUserFavoritesInDB($productId) {
    try {
        $authUser = Auth::user();
        $authUser->favoritesOffers()->detach($productId);

        return true;
    } catch(\Exception $err) {
        return false;
    }
}

function apiAddOfferToUserFavorites($id) {
    $result = apiAddOfferToUserFavoritesInDB($id);

    return $result;
}

function apiRemoveOfferFromUserFavorites($id) {
    $result = apiRemoveOfferFromUserFavoritesInDB($id);

    return $result;
}

function apiGetAllUserFavoritesProductsFormatted() {
    $result = apiGetAllUserFavoritesOffersFromDB();

    if($result) {
        return $result;
    } else {
        return [];
    }
}
