<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GeneralController;

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

Route::prefix('/v1')->group(function () {

    Route::get('/get-cities', [GeneralController::class, 'getCompanyCities'])->name('getCities');

    Route::get('/get-provinces', [GeneralController::class, 'getCompanyProvinces'])->name('getProvinces');

});