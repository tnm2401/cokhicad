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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function(Request $request){
    return response()->json(['Get api GF' => 'success', 'TCT' => 'Welcome'], 200);
})->name('api.index');

Route::get('/thong-ke-truy-cap', [App\Http\Controllers\Backend\DashboardController::class, 'counter'])->name('api.counter');
