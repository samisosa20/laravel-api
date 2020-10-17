<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\CityController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/v1')->group(function(){
    Route::get('status', [StatusController::class, 'index']);
    Route::get('cities', [CityController::class, 'index']);
    Route::get('cities/{id}', [CityController::class, 'show'])->name('showcity');
    Route::post('cities', [CityController::class, 'create']);
    Route::put('cities/{id}', [CityController::class, 'update']);
    Route::delete('cities/{id}', [CityController::class, 'delete']);
});
