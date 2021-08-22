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

Route::get('/', 'CatalogController@index');
Route::get('/catalog', 'CatalogController@index');

Route::get('/catalog/{catalogLevel2}/{product}', 'OffersController@index');

Route::get('/catalog/{catalogLevel2}', 'CatalogController@show');

Route::get('/sellers/{id}', 'SellersController@index');

Route::get('/offers/{id}', 'OffersController@show');

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');

Route::get('/register', 'RegisterController@index');
Route::post('/register', 'RegisterController@register');

Route::get('/logout', 'LogoutController@index');

Route::get('/profile', 'ProfileController@index')->middleware('auth');
Route::get('/profile/personal-info', 'ProfilePersonalDataController@index')->middleware('auth');
Route::post('/profile/personal-info', 'ProfilePersonalDataController@edit')->middleware('auth');
Route::get('/profile/organization-info', 'ProfileOrganizationDataController@index')->middleware('auth');
Route::post('/profile/organization-info', 'ProfileOrganizationDataController@edit')->middleware('auth');
Route::get('/profile/sale-points-info', 'ProfileSalePointsController@index')->middleware('auth');
Route::post('/profile/sale-points-info', 'ProfileSalePointsController@edit')->middleware('auth');
Route::get('/profile/sale-offers', 'ProfileSaleOffersController@index')->middleware('auth');
Route::get('/profile/sale-offers/create', 'ProfileSaleOffersController@create')->middleware('auth');
Route::post('/profile/sale-offers', 'ProfileSaleOffersController@store')->middleware('auth');
