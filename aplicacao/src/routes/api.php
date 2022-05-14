<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('api')->group(function () {
    Route::post('lines-of-code','App\Http\Controllers\SoftwareController@getLinesOfCode');
    Route::post('program-volume', 'App\Http\Controllers\SoftwareController@programVolume');
    Route::post('algorithm-volume', 'App\Http\Controllers\SoftwareController@algorithmVolume');
    Route::post('maturity', 'App\Http\Controllers\SoftwareController@maturity'); 
    Route::post('integrity', 'App\Http\Controllers\SoftwareController@integrity'); 
});
