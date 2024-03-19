<?php

use App\Http\Controllers\Api\PassportAuthController;
use App\Http\Controllers\YourAuthority;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);
Route::middleware('auth:api')->group(function () {
    Route::get('Authority/admin',[YourAuthority::class,'admin'])->middleware('user-access:admin');
    Route::get('Authority/user',[YourAuthority::class,'user'])->middleware('user-access:user');
    Route::post('logout',[PassportAuthController::class,'logout']);
});

