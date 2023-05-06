<?php

namespace App\Http\Controllers\controllers\web\rating\offer;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once(app_path() . '/Http/Controllers/helpers/web/rating/offer/index.php');


class OfferRatingController extends Controller
{
    /**
     * store
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = getStoreOfferRatingValidator($request);

        if($validator->fails()) {
            $data = [
                'data' => null,
                'errors' => ['Ошибка при заполнении формы!'],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }

        $isExists = checkIfOfferRatingExists($request);

        if($isExists) {
            $data = [
                'data' => null,
                'errors' => ['Оценка уже поставлена'],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }

        $result = storeOfferRating($request);

        $data = [
            'data' => [
                'success' => $result,
            ],
            'errors' => '',
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    /**
     * store
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validator = getUpdateOfferRatingValidator($request);

        if($validator->fails()) {
            $data = [
                'data' => null,
                'errors' => ['Что-то пошло не так. Попробуйте снова'],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }

        $result = updateOfferRating($request, $id);

        $data = [
            'data' => [
                'success' => $result,
            ],
            'errors' => '',
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
