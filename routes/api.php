<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;

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

// Public routes

Route::post('/register', [AuthController::class, 'register']);
Route::get('/register', [AuthController::class, 'test']);
Route::post('/login', [AuthController::class, 'login']);



// protected routes
Route::group(['middleware'=>['auth:sanctum']], function(){
    
    Route::get('/user-info', [UsersController::class, 'getUserInfo']);
    Route::post('/logout', [AuthController::class, 'logout']);

});
