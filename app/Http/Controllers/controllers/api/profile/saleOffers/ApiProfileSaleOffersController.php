<?php

namespace App\Http\Controllers\controllers\api\profile\saleOffers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

require_once('app/Http/Controllers/helpers/common/assets/index.php');
require_once('app/Http/Controllers/helpers/common/catalog/index.php');
require_once('app/Http/Controllers/helpers/common/measure/index.php');
require_once('app/Http/Controllers/helpers/common/request/index.php');
require_once('app/Http/Controllers/helpers/web/location/index.php');
require_once('app/Http/Controllers/helpers/web/profile/organizationData/index.php');
require_once('app/Http/Controllers/helpers/web/profile/saleOffers/index.php');
require_once('app/Http/Controllers/helpers/web/profile/salePointsInfo/index.php');

class ApiProfileSaleOffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $saleOffersList = getSaleOffersDataFormatted();

        $data = [
            'data' => $saleOffersList,
            'errors' => '',
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = getProfileSalePointsValidator($request);

        if($validator->fails()) {
            $data = [
                'data' => '',
                'errors' => getValidatorErrorsList($validator),
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        }

        $isSaved = tryStoreSalePointDataInDB($request);

        if($isSaved) {
            $data = [
                'data' => '',
                'errors' => [],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        }

        $data = [
            'data' => '',
            'errors' => [
                'common' => 'Что-то пошло не так. Попробуйте снова.',
            ],
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validator = getProfileSalePointsValidator($request);

        if($validator->fails()) {
            $data = [
                'data' => '',
                'errors' => getValidatorErrorsList($validator),
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        }

        $isSaved = tryUpdateSalePointDataInDB($request, $id);

        if($isSaved) {
            $data = [
                'data' => '',
                'errors' => [],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        }

        $data = [
            'data' => '',
            'errors' => [
                'common' => 'Что-то пошло не так. Попробуйте снова.',
            ],
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $isDestroyed = tryDestroySalePointDataInDB($id);

        if($isDestroyed) {
            $data = [
                'data' => '',
                'errors' => [],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        }

        $data = [
            'data' => '',
            'errors' => [
                'common' => 'Что-то пошло не так. Попробуйте снова.',
            ],
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }
}
