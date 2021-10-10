<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'controllers\catalog\CatalogController@index');
Route::get('/catalog', 'controllers\catalog\CatalogController@index');

Route::get('/catalog/{catalogLevelOneLink}/{productLink}', 'controllers\offers\OffersController@index');

Route::get('/catalog/{catalogLevelOneLink}', 'controllers\catalog\CatalogController@show');

Route::get('/sellers/{id}', 'controllers\sellers\SellersController@index');

Route::get('/offers/{id}', 'controllers\offers\OffersController@show');

Route::get('/login', 'controllers\authorization\login\LoginController@index');
Route::post('/login', 'controllers\authorization\login\LoginController@login');

Route::get('/register', 'controllers\authorization\register\RegisterController@index');
Route::post('/register', 'controllers\authorization\register\RegisterController@register');

Route::get('/logout', 'controllers\authorization\logout\LogoutController@index');

Route::get('/profile', 'controllers\profile\index\ProfileController@index')->middleware('auth');

Route::get('/profile/personal-info', 'controllers\profile\personalData\ProfilePersonalDataController@index')->middleware('auth');
Route::post('/profile/personal-info', 'controllers\profile\personalData\ProfilePersonalDataController@edit')->middleware('auth');

Route::get('/profile/organization-info', 'controllers\profile\organizationData\ProfileOrganizationDataController@index')->middleware('auth');
Route::get('/profile/organization-info/create', 'controllers\profile\organizationData\ProfileOrganizationDataController@create')->middleware('auth');
Route::get('/profile/organization-info/edit/{id}', 'controllers\profile\organizationData\ProfileOrganizationDataController@edit')->middleware('auth');
Route::get('/profile/organization-info/destroy/{id}', 'controllers\profile\organizationData\ProfileOrganizationDataController@destroy')->middleware('auth');
Route::post('/profile/organization-info', 'controllers\profile\organizationData\ProfileOrganizationDataController@store')->middleware('auth');
Route::put('/profile/organization-info/{id}', 'controllers\profile\organizationData\ProfileOrganizationDataController@update')->middleware('auth');

Route::get('/profile/sale-points-info', 'controllers\profile\salePointsInfo\ProfileSalePointsController@index')->middleware('auth');
Route::get('/profile/sale-points-info/create', 'controllers\profile\salePointsInfo\ProfileSalePointsController@create')->middleware('auth');
Route::get('/profile/sale-points-info/edit/{id}', 'controllers\profile\salePointsInfo\ProfileSalePointsController@edit')->middleware('auth');
Route::get('/profile/sale-points-info/destroy/{id}', 'controllers\profile\salePointsInfo\ProfileSalePointsController@destroy')->middleware('auth');
Route::post('/profile/sale-points-info', 'controllers\profile\salePointsInfo\ProfileSalePointsController@store')->middleware('auth');
Route::put('/profile/sale-points-info/{id}', 'controllers\profile\salePointsInfo\ProfileSalePointsController@update')->middleware('auth');

Route::get('/profile/sale-offers', 'controllers\profile\saleOffers\ProfileSaleOffersController@index')->middleware('auth');
Route::get('/profile/sale-offers/create', 'controllers\profile\saleOffers\ProfileSaleOffersController@create')->middleware('auth');
Route::get('/profile/sale-offers/edit/{id}', 'controllers\profile\saleOffers\ProfileSaleOffersController@edit')->middleware('auth');
Route::get('/profile/sale-offers/destroy/{id}', 'controllers\profile\saleOffers\ProfileSaleOffersController@destroy')->middleware('auth');
Route::post('/profile/sale-offers', 'controllers\profile\saleOffers\ProfileSaleOffersController@store')->middleware('auth');
Route::put('/profile/sale-offers/{id}', 'controllers\profile\saleOffers\ProfileSaleOffersController@update')->middleware('auth');
