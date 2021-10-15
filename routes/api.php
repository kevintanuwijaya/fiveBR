<?php

use App\Http\Controllers\GigController;
use App\Http\Controllers\LoveController;
use App\Models\Gig;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/love/{user}/{gig}',[LoveController::class,'store']);

Route::delete('/love/{user}/{gig}',[LoveController::class,'destroy']);
