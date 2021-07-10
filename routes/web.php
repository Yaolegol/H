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

Auth::routes();
