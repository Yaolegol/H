<?php

use App\Models\Offer;

function apiGetAllOffers($filter) {
    return Offer::where($filter)
        ->with([
        'catalogLevelTwo',
        'catalogLevelTwo.catalogLevelOne',
        'measure',
        'organization',
        'salePoints',
        'user',
    ])->get()->toArray();
}

function apiGetAllOffersMapMarkersDataFormatted($request) {
    $requestFilter = $request->input('filter') ?? [];
    $DBFilter = [
        'is_approved' => true,
    ];

    $catalogLevelOneId = $requestFilter['catalog']['levelOneId'] ?? null;
    $catalogLevelTwoId = $requestFilter['catalog']['levelTwoId'] ?? null;

    if($catalogLevelTwoId) {
        array_push($DBFilter, ['catalog_level_two_id', $catalogLevelTwoId]);
    } elseif($catalogLevelOneId) {
        array_push($DBFilter, ['catalog_level_one_id', $catalogLevelOneId]);
    }

    $offers = apiGetAllOffers($DBFilter);

    $offersMapMarkersDataList = [];

//    foreach ($offers as $offerItem) {
//        $offerItemMapMarkersData = apiGetOfferData($offerItem);
//
//        array_push($offersMapMarkersDataList, $offerItemMapMarkersData);
//    }

    foreach ($offers as $offerItem) {
        $offerItemMapMarkersData = apiGetOfferMapMarkersData($offerItem);

        if(!empty($offerItemMapMarkersData)) {
            array_push($offersMapMarkersDataList, $offerItemMapMarkersData);
        }
    }

    return $offersMapMarkersDataList;
}

function apiGetOfferData($offerItem) {
    return [
        'product' => [
            'address' => $offerItem['address'],
            'description' => $offerItem['description'],
            'id' => $offerItem['id'],
            'img' => [
                'src' => formatAssetPath($offerItem['photo_1']),
            ],
            'link' => '/offers/' . $offerItem['id'],
            'map_marker_lat' => $offerItem['map_marker_lat'],
            'map_marker_lng' => $offerItem['map_marker_lng'],
            'measure' => $offerItem['measure'],
            'phone' => $offerItem['phone'],
            'price' => $offerItem['price'],
            'price_description' => $offerItem['price_description'],
            'title' => $offerItem['title'],
        ],
        'salePoints' => apiGetSalePointsData($offerItem),
        'seller' => [
            'link' => '/sellers/' . $offerItem['user']['id'],
            'name' => $offerItem['user']['name'],
            'phone' => $offerItem['user']['phone'],
        ],
    ];
}

function apiGetSalePointsData($offerItem) {
    return array_reduce($offerItem['sale_points'], function($acc, $salePointItem) {
        $data = [
            'address' => $salePointItem['address'],
            'description' => $salePointItem['description'],
            'id' => $salePointItem['id'],
            'is_approved' => $salePointItem['is_approved'],
            'phone' => $salePointItem['phone'],
            'title' => $salePointItem['title'],
            'working_hours' => $salePointItem['working_hours'],
        ];

        return array_merge($acc, [$data]);
    }, []);
}

function apiGetOfferMapMarkersData($offer) {
    $isLatSet = isset($offer['map_marker_lat']) && $offer['map_marker_lat'] != '';
    $isLngSet = isset($offer['map_marker_lng']) && $offer['map_marker_lng'] != '';

    $offerMarkerData = [];

    if($isLatSet && $isLngSet) {
        $offerMarkerData = [
            'id' => $offer['id'],
            'markerCoords' => [
                'lat' => $offer['map_marker_lat'],
                'lng' => $offer['map_marker_lng'],
            ],
        ];
    }

    $salePointsMarkerDataList = [];

    if(isset($offer['sale_points'])) {
        $salePointsMarkerDataList = array_reduce($offer['sale_points'], function($acc, $salePointItem) use ($offer) {
            $isLatSet = isset($salePointItem['map_marker_lat']) && $salePointItem['map_marker_lat'] != '';
            $isLngSet = isset($salePointItem['map_marker_lng']) && $salePointItem['map_marker_lng'] != '';

            if($isLatSet && $isLngSet) {
                $salePointData = [
                    'id' => $offer['id'] . '_' . $salePointItem['id'],
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

    $isOfferMarkerDataExists = !empty($offerMarkerData);
    $isSalePointsMarkerDataListExists = !empty($salePointsMarkerDataList);

    if($isOfferMarkerDataExists || $isSalePointsMarkerDataListExists) {
        $markersList = [];

        if($isOfferMarkerDataExists) {
            array_push($markersList, [$offerMarkerData]);
        }

        if($isSalePointsMarkerDataListExists) {
            array_push($markersList, $salePointsMarkerDataList);
        }

        $offerMapMarkersData = [
            'markersList' => array_merge(...$markersList),
            'offer' => apiGetOfferData($offer),
        ];
    }

    return $offerMapMarkersData;
}

function apiGetOfferMapMarkersDataFormatted($offerId) {
    $offer = array_merge(...apiGetAllOffers(['id' => $offerId]));

    return apiGetOfferMapMarkersData($offer);
}
