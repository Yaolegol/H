<?php

use App\Http\Controllers\controllers\api\admin\ApiAdminController;
use App\Http\Controllers\controllers\api\authorization\register\ApiRegisterController;
use App\Http\Controllers\controllers\api\authorization\login\ApiLoginController;
use App\Http\Controllers\controllers\api\authorization\logout\ApiLogoutController;
use App\Http\Controllers\controllers\api\catalog\ApiCatalogController;
use App\Http\Controllers\controllers\api\categories\ApiCategoriesController;
use App\Http\Controllers\controllers\api\cities\ApiCitiesController;
use App\Http\Controllers\controllers\api\favorites\product\ApiFavoritesProductController;
use App\Http\Controllers\controllers\api\map\ApiMapController;
use App\Http\Controllers\controllers\api\measures\ApiMeasuresController;
use App\Http\Controllers\controllers\api\offers\ApiOffersController;
use App\Http\Controllers\controllers\api\profile\personalData\ApiProfilePersonalDataController;
use App\Http\Controllers\controllers\api\profile\organizationData\ApiProfileOrganizationDataController;
use App\Http\Controllers\controllers\api\profile\saleOffers\ApiProfileSaleOffersController;
use App\Http\Controllers\controllers\api\profile\salePointsInfo\ApiProfileSalePointsController;
use App\Http\Controllers\controllers\web\rating\offer\OfferRatingController;
use App\Http\Controllers\controllers\api\search\common\ApiSearchCommonController;
use App\Http\Controllers\controllers\api\sellers\ApiSellersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/catalog', [ApiCatalogController::class, 'index']);
Route::get('/catalog/{id}', [ApiCatalogController::class, 'show']);
Route::get('/categories', [ApiCategoriesController::class, 'index']);

Route::get('/cities', [ApiCitiesController::class, 'index']);

Route::get('/offers/{id}', [ApiOffersController::class, 'index']);
Route::get('/offer/{id}', [ApiOffersController::class, 'show']);

Route::get('/map/{id}', [ApiMapController::class, 'show']);
Route::post('/map', [ApiMapController::class, 'index']);

Route::get('/measures', [ApiMeasuresController::class, 'index']);

Route::post('/register/sendSms', [ApiRegisterController::class, 'sendSms']);
Route::post('/register/confirmCode', [ApiRegisterController::class, 'confirmCode']);
Route::post('/login', [ApiLoginController::class, 'login']);

Route::post('/search/common', [ApiSearchCommonController::class, 'index']);

Route::get('/sellers/{id}', [ApiSellersController::class, 'show']);

Route::group(['middleware' => ['auth:sanctum', 'userExistsApi']], function() {
    Route::post('/offer/rating', [OfferRatingController::class, 'store']);
    Route::post('/offer/rating/{id}', [OfferRatingController::class, 'update']);

    Route::get('/favorites/products', [ApiFavoritesProductController::class, 'index']);
    Route::get('/favorites/product/add/{id}', [ApiFavoritesProductController::class, 'add']);
    Route::get('/favorites/product/remove/{id}', [ApiFavoritesProductController::class, 'remove']);

    Route::get('/profile/personal-info', [ApiProfilePersonalDataController::class, 'index']);
    Route::post('/profile/personal-info', [ApiProfilePersonalDataController::class, 'updatePersonalData']);
    Route::post('/profile/add-avatar', [ApiProfilePersonalDataController::class, 'addAvatar']);
    Route::post('/profile/change-email', [ApiProfilePersonalDataController::class, 'updatePersonalEmail']);
    Route::post('/profile/change-password', [ApiProfilePersonalDataController::class, 'updatePersonalPassword']);
    Route::post('/profile/remove-avatar', [ApiProfilePersonalDataController::class, 'removeAvatar']);
    Route::post('/profile/destroy', [ApiProfilePersonalDataController::class, 'destroy']);

    Route::get('/profile/organizations-info', [ApiProfileOrganizationDataController::class, 'index']);
    Route::post('/profile/organizations-info', [ApiProfileOrganizationDataController::class, 'store']);
    Route::post('/profile/organizations-info/edit/{id}', [ApiProfileOrganizationDataController::class, 'update']);
    Route::post('/profile/organizations-info/destroy/{id}', [ApiProfileOrganizationDataController::class, 'destroy']);

    Route::get('/profile/sale-points-info', [ApiProfileSalePointsController::class, 'index']);
    Route::post('/profile/sale-points-info', [ApiProfileSalePointsController::class, 'store']);
    Route::post('/profile/sale-points-info/edit/{id}', [ApiProfileSalePointsController::class, 'update']);
    Route::post('/profile/sale-points-info/destroy/{id}', [ApiProfileSalePointsController::class, 'destroy']);

    Route::get('/profile/sale-offers', [ApiProfileSaleOffersController::class, 'index']);
    Route::post('/profile/sale-offers', [ApiProfileSaleOffersController::class, 'store']);
    Route::post('/profile/sale-offers/edit/{id}', [ApiProfileSaleOffersController::class, 'update']);
    Route::post('/profile/sale-offers/destroy/{id}', [ApiProfileSaleOffersController::class, 'destroy']);

    Route::post('/logout', [ApiLogoutController::class, 'logout']);
});

Route::post('/admin/offer/approve/{id}', [ApiAdminController::class, 'approve']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
