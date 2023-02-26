<?php

use App\Http\Controllers\controllers\map\mobileApp\MapMobileAppSinglePoint;
use App\Http\Controllers\controllers\web\admin\offers\AdminOffersController;
use App\Http\Controllers\controllers\web\admin\organizations\AdminOrganizationsController;
use App\Http\Controllers\controllers\web\admin\salePoints\AdminSalePointsController;
use App\Http\Controllers\controllers\web\admin\users\AdminUsersController;
use App\Http\Controllers\controllers\web\authorization\login\LoginController;
use App\Http\Controllers\controllers\web\authorization\logout\LogoutController;
use App\Http\Controllers\controllers\web\authorization\register\RegisterController;
use App\Http\Controllers\controllers\web\catalog\CatalogController;
use App\Http\Controllers\controllers\web\favorites\FavoritesController;
use App\Http\Controllers\controllers\web\map\MapController;
use App\Http\Controllers\controllers\web\offers\OffersController;
use App\Http\Controllers\controllers\web\profile\index\ProfileController;
use App\Http\Controllers\controllers\web\profile\organizationData\ProfileOrganizationDataController;
use App\Http\Controllers\controllers\web\profile\personalData\ProfilePersonalDataController;
use App\Http\Controllers\controllers\web\profile\saleOffers\ProfileSaleOffersController;
use App\Http\Controllers\controllers\web\profile\salePointsInfo\ProfileSalePointsController;
use App\Http\Controllers\controllers\web\sellers\SellersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MapController::class, 'index']);

Route::get('/catalog', [CatalogController::class, 'index']);
Route::get('/catalog/{catalogLevelOneLink}', [CatalogController::class, 'show']);

Route::get('/sellers/{id}', [SellersController::class, 'show']);

Route::get('/offers/{id}', [OffersController::class, 'show']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register/sendSms', [RegisterController::class, 'sendSms']);
Route::post('/register/confirmCode', [RegisterController::class, 'confirmCode']);

Route::get('/logout', [LogoutController::class, 'index']);

Route::get('/map/mobile-app/single-point', [MapMobileAppSinglePoint::class, 'singlePoint']);

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/offers', [AdminOffersController::class, 'index']);
    Route::post('/admin/offer/approve/{id}', [AdminOffersController::class, 'approve']);
    Route::post('/admin/offer/reject/{id}', [AdminOffersController::class, 'reject']);

    Route::get('/admin/users', [AdminUsersController::class, 'index']);
    Route::post('/admin/user/approve/{id}', [AdminUsersController::class, 'approve']);
    Route::post('/admin/user/reject/{id}', [AdminUsersController::class, 'reject']);

    Route::get('/admin/organizations', [AdminOrganizationsController::class, 'index']);
    Route::post('/admin/organization/approve/{id}', [AdminOrganizationsController::class, 'approve']);
    Route::post('/admin/organization/reject/{id}', [AdminOrganizationsController::class, 'reject']);

    Route::get('/admin/sale-points', [AdminSalePointsController::class, 'index']);
    Route::post('/admin/sale-point/approve/{id}', [AdminSalePointsController::class, 'approve']);
    Route::post('/admin/sale-point/reject/{id}', [AdminSalePointsController::class, 'reject']);

    Route::get('/favorites', [FavoritesController::class, 'index']);
    Route::get('/favorites/products', [FavoritesController::class, 'products']);
    Route::get('/favorites/products/add/{id}', [FavoritesController::class, 'productsAdd']);
    Route::get('/favorites/products/remove/{id}', [FavoritesController::class, 'productsRemove']);

    Route::get('/profile', [ProfileController::class, 'index']);

    Route::get('/profile/personal-info', [ProfilePersonalDataController::class, 'index']);
    Route::post('/profile/personal-info/edit-personal-data', [ProfilePersonalDataController::class, 'editPersonalData']);
    Route::post('/profile/personal-info/edit-password', [ProfilePersonalDataController::class, 'editPassword']);

    Route::get('/profile/organization-info/create', [ProfileOrganizationDataController::class, 'create']);
    Route::get('/profile/organization-info/destroy/{id}', [ProfileOrganizationDataController::class, 'destroy']);
    Route::get('/profile/organization-info/edit/{id}', [ProfileOrganizationDataController::class, 'edit']);
    Route::put('/profile/organization-info/{id}', [ProfileOrganizationDataController::class, 'update']);
    Route::get('/profile/organization-info', [ProfileOrganizationDataController::class, 'index']);
    Route::post('/profile/organization-info', [ProfileOrganizationDataController::class, 'store']);

    Route::get('/profile/sale-points-info/create', [ProfileSalePointsController::class, 'create']);
    Route::get('/profile/sale-points-info/destroy/{id}', [ProfileSalePointsController::class, 'destroy']);
    Route::get('/profile/sale-points-info/edit/{id}', [ProfileSalePointsController::class, 'edit']);
    Route::put('/profile/sale-points-info/{id}', [ProfileSalePointsController::class, 'update']);
    Route::get('/profile/sale-points-info', [ProfileSalePointsController::class, 'index']);
    Route::post('/profile/sale-points-info', [ProfileSalePointsController::class, 'store']);

    Route::get('/profile/sale-offers/create', [ProfileSaleOffersController::class, 'create']);
    Route::get('/profile/sale-offers/destroy/{id}', [ProfileSaleOffersController::class, 'destroy']);
    Route::get('/profile/sale-offers/edit/{id}', [ProfileSaleOffersController::class, 'edit']);
    Route::put('/profile/sale-offers/{id}', [ProfileSaleOffersController::class, 'update']);
    Route::get('/profile/sale-offers', [ProfileSaleOffersController::class, 'index']);
    Route::post('/profile/sale-offers', [ProfileSaleOffersController::class, 'store']);
});
