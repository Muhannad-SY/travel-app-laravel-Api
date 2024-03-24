<?php

use App\Http\Controllers\Api\v1\CategoryController;
use App\Http\Controllers\Api\v1\ProfileController;
use App\Http\Controllers\Api\v1\TourController;
use App\Http\Controllers\Api\v1\TourReviewController;
use App\Http\Controllers\Api\v1\UserController;
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
Route::prefix('/v1')->group(function(){

  // login and Register functions

  Route::post('/new/user' , [UserController::class , 'store']);

  Route::post('/login' , [UserController::class , 'login']);


Route::middleware('auth:sanctum')->group( function () {

  //get the profile and logout functios

  Route::post('/logout' , [UserController::class , 'logout']);

  Route::post('/me' , [UserController::class , 'show']);

  //Profile deparment 

  Route::get('/profile' , [ProfileController::class , 'index']);

  Route::get('/new/profile' , [ProfileController::class , 'store']);

  Route::get('/update/profile' , [ProfileController::class , 'update']);

  //Category depatment 

  Route::get('/category/tours' , [CategoryController::class , 'show']);
  
  Route::get('/category' , [CategoryController::class , 'index']);

  //tours deportment 

  Route::get('/all/tour' , [TourController::class , 'index']);

  Route::post('/tour' , [TourController::class , 'show']);  // you will post the country name in body to show tour on that country 

  Route::get('/one/tour/{tour_id}' , [TourController::class , 'showOneTour']);

  // store review aportment

  Route::post('/add/review' , [TourReviewController::class , 'store']);





   });

});