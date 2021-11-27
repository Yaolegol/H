<?php

function apiGetOfferMapMarkersDataFormatted($offerId) {
    $offer = array_merge(...getOffer($offerId));

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

    $offerMapMarkersData = [
        'markersData' => array_merge([$offerMarkerData], $salePointsMarkerDataList),
        'price' => $offer['price'],
        'title' => $offer['title'],
    ];

    return $offerMapMarkersData;
}
