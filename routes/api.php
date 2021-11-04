<?php

use App\Http\Controllers\controllers\api\authorization\register\ApiRegisterController;
use App\Http\Controllers\controllers\api\authorization\login\ApiLoginController;
use App\Http\Controllers\controllers\api\authorization\logout\ApiLogoutController;
use App\Http\Controllers\controllers\api\catalog\ApiCatalogController;
use App\Http\Controllers\controllers\api\profile\personalData\ApiProfilePersonalDataController;
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

Route::post('/register', [ApiRegisterController::class, 'register']);
Route::post('/login', [ApiLoginController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('/test', function(Request $request) {
        return $request->user();
    });
    Route::get('/profile/personal-info', [ApiProfilePersonalDataController::class, 'index']);
    Route::post('/profile/personal-info', [ApiProfilePersonalDataController::class, 'update']);
    Route::post('/profile/add-avatar', [ApiProfilePersonalDataController::class, 'addAvatar']);
    Route::post('/profile/remove-avatar', [ApiProfilePersonalDataController::class, 'removeAvatar']);
    Route::post('/logout', [ApiLogoutController::class, 'logout']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
