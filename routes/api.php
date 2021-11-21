<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\HotelController;
use App\Http\Controllers\API\BranchController;
use App\Http\Controllers\API\RoomController;
use App\Http\Controllers\API\BookingController;

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
  
Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);
     
Route::middleware('auth:api')->group( function () {
    Route::resource('hotel', HotelController::class);
    Route::resource('branch',BranchController::class);
    Route::resource('room',RoomController::class);
    Route::resource('booking',BookingController::class);
});
