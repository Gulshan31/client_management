<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;
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
Route::get('/main-section/{id}',[ProjectController::class,'getMainSection']);
Route::get('/sub-section/{id}',[ProjectController::class,'getSubSection']);
Route::get('/list/options/{id}',[ProjectController::class,'getOptionsAndList']);
