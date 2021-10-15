<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\GigController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Models\Gig;
use App\Models\User;
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

Route::get('/', [GeneralController::class,'homePage']);

Route::get('/login',[AuthController::class,'loginPage']);

Route::post('/login', [AuthController::class,'login']);

Route::get('/cookie/set/{email}', [AuthController::class,'setCookie']);

Route::get('/logout',[AuthController::class,'logout']);

Route::get('/register',[AuthController::class,'registerPage']);

Route::post('/register', [AuthController::class,'register']);

Route::post('/profile/edit/{id}',[UserController::class,'edit']);

Route::get('/profile/edit/{id}',[UserController::class,'showEdit']);

Route::get('/profile/{id}',[UserController::class,'show']);


//GIG
Route::get('/gig/checkout/{gig}/{type}', [GigController::class,'showCheckoutPage']);

Route::post('/gig/checkout/{gig}', [TransactionController::class,'store']);

Route::get('/gig/create', [GigController::class, 'showInsertPage']);

Route::get('/gig/edit/{id}', [GigController::class,'showEditPage']);

Route::post('/gig/edit/{id}', [GigController::class,'update']);

Route::post('/gig/create',[GigController::class,'store']);

Route::delete('/gig/{id}',[GigController::class,'destroy']);

Route::get('/gig/{id}',[GigController::class,'show']);


//Review

Route::put('/gig/review/{gig}',[ReviewController::class,'store']);


//SEARCH

Route::get('/search', [GeneralController::class,'searchPage']);

//TRANSACTION

Route::get('/transaction',[GeneralController::class,'transactionPage']);

//Love

Route::get('/loved',[GeneralController::class,'lovedPage']);