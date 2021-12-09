<?php

use App\Http\Controllers\controllers\api\authorization\register\ApiRegisterController;
use App\Http\Controllers\controllers\api\authorization\login\ApiLoginController;
use App\Http\Controllers\controllers\api\authorization\logout\ApiLogoutController;
use App\Http\Controllers\controllers\api\catalog\ApiCatalogController;
use App\Http\Controllers\controllers\api\map\ApiMapController;
use App\Http\Controllers\controllers\api\profile\personalData\ApiProfilePersonalDataController;
use App\Http\Controllers\controllers\api\profile\organizationData\ApiProfileOrganizationDataController;
use App\Http\Controllers\controllers\api\profile\salePointsInfo\ApiProfileSalePointsController;
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

Route::get('/map/{id}', [ApiMapController::class, 'show']);
Route::post('/map', [ApiMapController::class, 'index']);

Route::post('/register', [ApiRegisterController::class, 'register']);
Route::post('/login', [ApiLoginController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('/profile/personal-info', [ApiProfilePersonalDataController::class, 'index']);
    Route::post('/profile/personal-info', [ApiProfilePersonalDataController::class, 'updatePersonalData']);
    Route::post('/profile/add-avatar', [ApiProfilePersonalDataController::class, 'addAvatar']);
    Route::post('/profile/change-email', [ApiProfilePersonalDataController::class, 'updatePersonalEmail']);
    Route::post('/profile/change-password', [ApiProfilePersonalDataController::class, 'updatePersonalPassword']);
    Route::post('/profile/remove-avatar', [ApiProfilePersonalDataController::class, 'removeAvatar']);

    Route::get('/profile/organizations-info', [ApiProfileOrganizationDataController::class, 'index']);
    Route::post('/profile/organizations-info', [ApiProfileOrganizationDataController::class, 'store']);
    Route::post('/profile/organizations-info/edit/{id}', [ApiProfileOrganizationDataController::class, 'update']);
    Route::post('/profile/organizations-info/destroy/{id}', [ApiProfileOrganizationDataController::class, 'destroy']);

    Route::get('/profile/sale-points-info', [ApiProfileSalePointsController::class, 'index']);

    Route::post('/logout', [ApiLogoutController::class, 'logout']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
