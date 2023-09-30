<?php

namespace App\Http\Controllers\controllers\web\profile\saleOffers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

require_once(app_path() . '/Http/Controllers/helpers/common/assets/index.php');
require_once(app_path() . '/Http/Controllers/helpers/common/catalog/index.php');
require_once(app_path() . '/Http/Controllers/helpers/common/errors/index.php');
require_once(app_path() . '/Http/Controllers/helpers/common/measure/index.php');
require_once(app_path() . '/Http/Controllers/helpers/common/request/index.php');
require_once(app_path() . '/Http/Controllers/helpers/web/profile/organizationData/index.php');
require_once(app_path() . '/Http/Controllers/helpers/web/profile/saleOffers/index.php');
require_once(app_path() . '/Http/Controllers/helpers/web/profile/salePointsInfo/index.php');
require_once(app_path() . '/Http/Controllers/helpers/web/profile/personalData/index.php');
require_once(app_path() . '/Http/Controllers/helpers/web/offers/index.php');

class ProfileSaleOffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $catalogFull = getCatalogFull();
        $saleOffersList = getSaleOffersDataFormatted();
        $userData = getUserDataFormatted();

        return view('pages.profile.sale-offers.index.index', [
            'catalogHeader' => $catalogFull,
            'saleOffersList' => $saleOffersList,
            'userData' => $userData,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $catalogFull = getCatalogFull();
        $organizationsList = getUserOrganizationsListFormatted(true);
        $salePointsList = DB_getUserSalePoints(true);
        $catalogCategoriesList = getCatalogCategoriesList($catalogFull);
        $catalogSubCategoriesList = getCatalogSubCategoriesList($catalogFull);

        return view('pages.profile.sale-offers.create.index', [
            'catalogCategoriesList' => $catalogCategoriesList,
            'catalogSubCategoriesList' => $catalogSubCategoriesList,
            'catalogFull' => $catalogFull,
            'catalogHeader' => $catalogFull,
            'organizationsList' => $organizationsList,
            'salePointsList' => $salePointsList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function enable(Request $request, $saleOfferId)
    {
        $isSaved = toggleOfferEnable($saleOfferId, 1);

        if($isSaved) {
            return redirect('/profile/sale-offers');
        }

        return back()
            ->withErrors([
                'commonError' => 'Что-то пошло не так. Попробуйте снова'
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function disable(Request $request, $saleOfferId)
    {
        $isSaved = toggleOfferEnable($saleOfferId, 0);

        if($isSaved) {
            return redirect('/profile/sale-offers');
        }

        return back()
            ->withErrors([
                'commonError' => 'Что-то пошло не так. Попробуйте снова'
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = getProfileSaleOffersValidator($request);

        if($validator->fails()) {
            $validator->errors()->add('commonError', 'Ошибки при заполнении формы! Пожалуйста, проверьте правильность заполнения формы!');

            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $isSaved = trySaveSaleOfferInDB($request);

        if($isSaved) {
            return redirect('/profile/sale-offers');
        }

        return back()
            ->withErrors([
                'commonError' => 'Достигнут лимит количества товарных предложений! Вы можете удалить или отредактировать имеющиеся, а также написать нам на email, телефон или в социальных сетях для увеличения лимита!'
            ])
            ->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit(Request $request, $saleOfferId)
    {
        $catalogFull = getCatalogFull();
        $saleOfferItemData = getSaleOfferItemDataFormatted($saleOfferId);
        $organizationsList = getUserOrganizationsWithSelectedList($saleOfferItemData);
        $salePointsList = getSaleOfferSalePointsListFormatted($saleOfferItemData);
        $catalogCategoriesList = getCatalogCategoriesWithSelectedList($catalogFull, $saleOfferItemData);
        $catalogSubCategoriesList = getCatalogSubCategoriesWithSelectedList($catalogFull, $saleOfferItemData);

        return view('pages.profile.sale-offers.edit.index', [
            'catalogCategoriesList' => $catalogCategoriesList,
            'catalogSubCategoriesList' => $catalogSubCategoriesList,
            'catalogFull' => $catalogFull,
            'catalogHeader' => $catalogFull,
            'organizationsList' => $organizationsList,
            'saleOfferItemData' => $saleOfferItemData,
            'salePointsList' => $salePointsList,
        ]);
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
        $validator = getProfileSaleOffersValidator($request);

        if($validator->fails()) {
            $validator->errors()->add('commonError', 'Ошибки при заполнении формы! Пожалуйста, проверьте правильность заполнения формы!');

            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $isSaved = tryUpdateSaleOfferInDB($request, $id);

        if($isSaved) {
            return redirect('/profile/sale-offers');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $isDestroyed = tryDestroySaleOfferDataInDB($id);

        if($isDestroyed) {
            return redirect('/profile/sale-offers');
        }

        return abort(500);
    }
}
