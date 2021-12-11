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

function apiAddOfferToUserFavorites($request) {
    $requestData = $request->input('data');
    $productId = $requestData['productId'];

    $result = apiAddOfferToUserFavoritesInDB($productId);

    return $result;
}

function apiRemoveOfferFromUserFavorites($request) {
    $requestData = $request->input('data');
    $productId = $requestData['productId'];

    $result = apiRemoveOfferFromUserFavoritesInDB($productId);

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
