<?php

use App\Models\Offer;
use App\Models\OfferRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

function DB_getOffer($id) {
    try {
        return Offer::where([
            ['id', $id],
        ])->get()->toArray();
    } catch(\Exception $err) {
        abort(500);
    }
}

function DB_getUserOfferRatingByOffer($id) {
    $user = Auth::user();

    try {
        return OfferRating::where([
            ['offer_id', $id],
            ['user_id', $user->id],
        ])->get()->toArray();
    } catch(\Exception $err) {
        abort(500);
    }
}

function DB_setOfferRating($id, $rating, $ratingValues, $ratingVotes) {
    try {
        Offer::where([
            ['id', $id],
        ])->update([
            'rating' => $rating,
            'rating_values' => $ratingValues,
            'rating_votes' => $ratingVotes,
        ]);;

        return true;
    } catch(\Exception $err) {
        abort(500);
    }
}

function DB_storeOfferRating($userId, $offer_id, $value, $comment) {
    try {
        OfferRating::create([
            'comment' => $comment,
            'value' => $value,
            'user_id' => $userId,
            'offer_id' => $offer_id,
        ]);

        return true;
    } catch(\Exception $err) {
        abort(500);
    }
}

function DB_updateOfferRating($userId, $offer_id, $value, $comment) {
    try {
        OfferRating::where([
            ['offer_id', $offer_id],
            ['user_id', $userId],
        ])->update([
            'comment' => $comment,
            'value' => $value,
        ]);

        return true;
    } catch(\Exception $err) {
        abort(500);
    }
}

function calculateNewRating($offerData, $value) {
    $ratingValues = (double) $offerData['rating_values'];
    $ratingVotes = (double) $offerData['rating_votes'];
    $ratingValuesNew = $ratingValues + $value;
    $ratingVotesNew = $ratingVotes + 1;

    return [
        'rating' => $ratingValuesNew / $ratingVotesNew,
        'rating_values' => $ratingValuesNew,
        'rating_votes' => $ratingVotesNew,
    ];
}

function calculateUpdateRating($offerData, $value, $userPrevRatingValue) {
    $ratingValues = (double) $offerData['rating_values'];
    $ratingVotes = (double) $offerData['rating_votes'];
    $ratingValuesNew = $ratingValues - $userPrevRatingValue + $value;

    return [
        'rating' => $ratingValuesNew / $ratingVotes,
        'rating_values' => $ratingValuesNew,
        'rating_votes' => $ratingVotes,
    ];
}

function checkIfOfferRatingExists($request) {
    $offerId = (int) $request->input('offer_id');
    $dataList = DB_getUserOfferRatingByOffer($offerId);

    return count($dataList) > 0;
}

function storeOfferRating(Request $request) {
    $comment = $request->input('comment');
    $value = (int) $request->input('value');
    $offer_id = (int) $request->input('offer_id');
    $user = Auth::user();
    $userId = $user->id;

    DB_storeOfferRating($userId, $offer_id, $value, $comment);
    $_offerData = DB_getOffer($offer_id);
    $offerData = $_offerData[0];

    $ratingData = calculateNewRating($offerData, $value);

    DB_setOfferRating($offer_id, $ratingData['rating'], $ratingData['rating_values'], $ratingData['rating_votes']);

    return true;
}

function updateOfferRating(Request $request, $id) {
    $comment = $request->input('comment');
    $value = (int) $request->input('value');
    $offer_id = (int) $request->input('offer_id');
    $user = Auth::user();
    $userId = $user->id;
    $userRatingDataList = $user->offerRating()->get()->toArray();
    $userPrevRatingData = array_merge(...array_filter($userRatingDataList, function($data) use($offer_id) {
        return $data['offer_id'] === $offer_id;
    }));
    $userPrevRatingValue = (int) $userPrevRatingData['value'];

    DB_updateOfferRating($userId, $offer_id, $value, $comment);

    $_offerData = DB_getOffer($offer_id);
    $offerData = $_offerData[0];

    $ratingData = calculateUpdateRating($offerData, $value, $userPrevRatingValue);

    DB_setOfferRating($offer_id, $ratingData['rating'], $ratingData['rating_values'], $ratingData['rating_votes']);

    return true;
}

function getStoreOfferRatingValidator($request) {
    return Validator::make(
        $request->all(),
        [
            'comment' => ['max:1000'],
            'value' => ['required', 'integer', 'between:1,5'],
        ],
        [
            'between' => 'Поле должно содержать значение от 1 до 5',
            'integer' => 'Поле должно содержать число',
            'max' => 'Поле должно содержать не более 1000 символов',
            'required' => 'Поле обязательно для заполнения',
        ]
    );
}

function getUpdateOfferRatingValidator($request) {
    return Validator::make(
        $request->all(),
        [
            'comment' => ['max:1000'],
            'value' => ['required', 'integer', 'between:1,5'],
        ],
        [
            'between' => 'Поле должно содержать значение от 1 до 5',
            'integer' => 'Поле должно содержать число',
            'max' => 'Поле должно содержать не более 1000 символов',
            'required' => 'Поле обязательно для заполнения',
        ]
    );
}
