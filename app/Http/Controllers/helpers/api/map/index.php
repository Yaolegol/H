<?php

use App\Models\Offer;

function apiGetAllOffers() {
    return Offer::with([
        'catalogLevelTwo',
        'catalogLevelTwo.catalogLevelOne',
        'measure',
        'organization',
        'salePoints',
        'user',
    ])->get()->toArray();
}

function apiGetAllOffersMapMarkersDataFormatted() {
    $offers = apiGetAllOffers();

    $offersMapMarkersDataList = [];

    foreach ($offers as $offerItem) {
        $offerItemMapMarkersData = apiGetOfferMapMarkersData($offerItem);

        if(!empty($offerItemMapMarkersData)) {
            array_push($offersMapMarkersDataList, $offerItemMapMarkersData);
        }
    }

    return $offersMapMarkersDataList;
}

function apiGetOfferMapMarkersData($offer) {
    $isLatSet = isset($offer['map_marker_lat']) && $offer['map_marker_lat'] != '';
    $isLngSet = isset($offer['map_marker_lng']) && $offer['map_marker_lng'] != '';

    $offerMarkerData = [];

    if($isLatSet && $isLngSet) {
        $offerMarkerData = [
            'data' => [
                'address' => $offer['address'],
                'phone' => $offer['phone'],
            ],
            'markerCoords' => [
                'lat' => $offer['map_marker_lat'],
                'lng' => $offer['map_marker_lng'],
            ],
        ];
    }

    $salePointsMarkerDataList = [];

    if(isset($offer['sale_points'])) {
        $salePointsMarkerDataList = array_reduce($offer['sale_points'], function($acc, $salePointItem) {
            $isLatSet = isset($salePointItem['map_marker_lat']) && $salePointItem['map_marker_lat'] != '';
            $isLngSet = isset($salePointItem['map_marker_lng']) && $salePointItem['map_marker_lng'] != '';

            if($isLatSet && $isLngSet) {
                $salePointData = [
                    'data' => [
                        'address' => $salePointItem['address'],
                        'phone' => $salePointItem['phone'],
                    ],
                    'markerCoords' => [
                        'lat' => $salePointItem['map_marker_lat'],
                        'lng' => $salePointItem['map_marker_lng'],
                    ],
                ];

                return array_merge($acc, [$salePointData]);
            }

            return $acc;
        }, []);
    }

    $offerMapMarkersData = [];

    if(!empty($offerMarkerData) || !empty($salePointsMarkerDataList)) {
        $offerMapMarkersData = [
            'markersList' => array_merge([$offerMarkerData], $salePointsMarkerDataList),
            'price' => $offer['price'],
            'title' => $offer['title'],
        ];
    }

    return $offerMapMarkersData;
}

function apiGetOfferMapMarkersDataFormatted($offerId) {
    $offer = array_merge(...getOffer($offerId));

    return apiGetOfferMapMarkersData($offer);
}
