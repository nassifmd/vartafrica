<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\FarmerAPIController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// This is where all the api endpoints are going to be
Route::get('/test', function (Request $request) {
    return response()->json(['success' => true]);
});

Route::post('sign_in', [LoginController::class, 'apiLogin']);

Route::group(['middleware' => 'checkapitoken'], function () {
    Route::post('/register', [FarmerAPIController::class, 'register']);
});
//open postman now ...
// is the server running?
// the server running this project. Is it running?
