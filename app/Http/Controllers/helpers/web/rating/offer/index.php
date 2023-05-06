<?php

use Illuminate\Http\Request;
use App\Models\OfferRating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

function DB_storeOfferRating(Request $request) {
    $user = Auth::user();

    try {
        OfferRating::create([
            'comment' => $request->input('comment'),
            'value' => (int) $request->input('value'),
            'user_id' => $user->id,
            'offer_id' => (int) $request->input('offer_id'),
        ]);

        return true;
    } catch(\Exception $err) {
        abort(500);
    }
}

function DB_updateOfferRating($request, $id) {
    $user = Auth::user();

    try {
        OfferRating::where([
            ['offer_id', $id],
            ['user_id', $user->id],
        ])->update([
            'value' => (int) $request->input('value'),
        ]);

        return true;
    } catch(\Exception $err) {
        abort(500);
    }
}

function checkIfOfferRatingExists($request) {
    $offerId = (int) $request->input('offer_id');
    $dataList = DB_getUserOfferRatingByOffer($offerId);

    return count($dataList) > 0;
}

function storeOfferRating(Request $request) {
    return DB_storeOfferRating($request);
}

function updateOfferRating(Request $request, $id) {
    return DB_updateOfferRating($request, $id);
}

function getStoreOfferRatingValidator($request) {
    return Validator::make(
        $request->all(),
        [
            'value' => ['required', 'integer', 'between:1,5'],
        ],
        [
            'between' => 'Поле должно содержать значение от 1 до 5',
            'integer' => 'Поле должно содержать число',
            'required' => 'Поле обязательно для заполнения',
        ]
    );
}

function getUpdateOfferRatingValidator($request) {
    return Validator::make(
        $request->all(),
        [
            'value' => ['required', 'integer', 'between:1,5'],
        ],
        [
            'between' => 'Поле должно содержать значение от 1 до 5',
            'integer' => 'Поле должно содержать число',
            'required' => 'Поле обязательно для заполнения',
        ]
    );
}
