<?php

use Illuminate\Http\Request;
use App\Models\OfferRating;
use Illuminate\Support\Facades\Auth;

function DB_storeOfferRating(Request $request) {
    $user = Auth::user();

    try {
        OfferRating::create([
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

function storeOfferRating(Request $request) {
    return DB_storeOfferRating($request);
}

function updateOfferRating(Request $request, $id) {
    return DB_updateOfferRating($request, $id);
}
