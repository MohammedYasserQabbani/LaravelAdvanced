<?php

use App\Http\Controllers\Api\AuthUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('register', [AuthUserController::class, 'register']);
Route::post('login', [AuthUserController::class, 'login']);
Route::middleware('auth:api')->group(function () {
    Route::get('get-user', [AuthUserController::class, 'userInfo']);
    Route::post('logout',[AuthUserController::class,'logout']);
});

