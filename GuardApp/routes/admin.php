<?php
use App\Http\Controllers\Api\AuthAdminController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API admins routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register', [AuthAdminController::class, 'register']);
Route::post('login', [AuthAdminController::class, 'login']);
Route::middleware('auth:admin')->group(function () {
    Route::get('get-user', [AuthAdminController::class, 'userInfo']);
    Route::post('logout',[AuthAdminController::class,'logout']);
});