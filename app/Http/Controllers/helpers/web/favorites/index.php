<?php

use Illuminate\Support\Facades\Auth;

function formatOffers($offers, $userData) {
    return array_map(function ($item) use ($userData) {
        $item['user'] = $userData;
        $item['offerLink'] = '/' . 'offers' . '/' . $item['id'];

        $photoIteration = 1;
        while ($photoIteration <= 3) {
            $currentPhotoName = 'photo_' . $photoIteration;
            $currentPhotoValue = $item[$currentPhotoName];

            if ($currentPhotoValue) {
                $path = str_replace('public/', '', $currentPhotoValue);
                $item[$currentPhotoName] = '/storage/' . $path;
            }

            $photoIteration++;
        }

        return $item;
    }, $offers);
}

function getUserFavorites($authUser) {
    try {
        return $authUser->favoritesOffers()->get()->toArray();
    } catch(\Exception $err) {
        return false;
    }
}

function getUserFavoritesFormatted() {
    $authUser = Auth::user();
    $authUserData = $authUser->getUserData();
    $favoritesList = getUserFavorites($authUser);

    return formatOffers($favoritesList, $authUserData);
}
