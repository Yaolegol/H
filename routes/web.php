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

Route::get('/', 'catalog\CatalogController@index');
Route::get('/catalog', 'catalog\CatalogController@index');

Route::get('/catalog/{catalogLevelOneLink}/{productLink}', 'offers\OffersController@index');

Route::get('/catalog/{catalogLevelOneLink}', 'catalog\CatalogController@show');

Route::get('/sellers/{id}', 'sellers\SellersController@index');

Route::get('/offers/{id}', 'offers\OffersController@show');

Route::get('/login', 'authorization\login\LoginController@index');
Route::post('/login', 'authorization\login\LoginController@login');

Route::get('/register', 'authorization\register\RegisterController@index');
Route::post('/register', 'authorization\register\RegisterController@register');

Route::get('/logout', 'authorization\logout\LogoutController@index');

Route::get('/profile', 'profile\index\ProfileController@index')->middleware('auth');

Route::get('/profile/personal-info', 'profile\personalData\ProfilePersonalDataController@index')->middleware('auth');
Route::post('/profile/personal-info', 'profile\personalData\ProfilePersonalDataController@edit')->middleware('auth');

Route::get('/profile/organization-info', 'profile\organizationData\ProfileOrganizationDataController@index')->middleware('auth');
Route::post('/profile/organization-info', 'profile\organizationData\ProfileOrganizationDataController@edit')->middleware('auth');

Route::get('/profile/sale-points-info', 'profile\salePointsInfo\ProfileSalePointsController@index')->middleware('auth');
Route::get('/profile/sale-points-info/create', 'profile\salePointsInfo\ProfileSalePointsController@create')->middleware('auth');
Route::get('/profile/sale-points-info/edit/{id}', 'profile\salePointsInfo\ProfileSalePointsController@edit')->middleware('auth');
Route::get('/profile/sale-points-info/destroy/{id}', 'profile\salePointsInfo\ProfileSalePointsController@destroy')->middleware('auth');
Route::post('/profile/sale-points-info', 'profile\salePointsInfo\ProfileSalePointsController@store')->middleware('auth');

Route::get('/profile/sale-offers', 'profile\saleOffers\ProfileSaleOffersController@index')->middleware('auth');
Route::get('/profile/sale-offers/create', 'profile\saleOffers\ProfileSaleOffersController@create')->middleware('auth');
Route::get('/profile/sale-offers/edit/{id}', 'profile\saleOffers\ProfileSalePointsController@edit')->middleware('auth');
Route::get('/profile/sale-offers/destroy/{id}', 'profile\saleOffers\ProfileSalePointsController@destroy')->middleware('auth');
Route::post('/profile/sale-offers', 'profile\saleOffers\ProfileSaleOffersController@store')->middleware('auth');
