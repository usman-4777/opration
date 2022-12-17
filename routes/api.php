<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\AttendanceController;


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
/**
 * post route for register
 * post route for login
 * post route for logout
 */
    Route::post('register',[\App\Http\Controllers\AuthController::class,'register']);
Route::post('login',[\App\Http\Controllers\AuthController::class,'login']);
Route::post('logout',[\App\Http\Controllers\AuthController::class,'logout']);
/**
 * comment some routes for some reasons
 */
//Route::apiResource('/employs',[\App\Http\Controllers\EmployController::class,'employs']);
//Route::apiResource('salary',\App\Http\Controllers\SalaryController::class);

Route::apiResource('expense',\App\Http\Controllers\ExpenseController::class);
//Route::apiResources('/expense',\App\Http\Controllers\ExpenseController::class;
Route::apiResource('income',\App\Http\Controllers\IncomeController::class);
Route::apiResource('attendance',\App\Http\Controllers\AttendanceController::class);

/**
 * middleware for Admin
 * apiResources Routes for employs
 * apiResources Routes for users
 */
Route::group(['middleware' => ['isAdmin', 'auth:sanctum']], function (){
    Route::apiResources([
        'employs' => \App\Http\Controllers\EmployController::class,
        'users'=> \App\Http\Controllers\UserController::class,
    ]);
});
/**
 * apiResources Routes for Salary
 *
 */
Route::group(['middleware' => ['isCashier']], function (){
    Route::apiResources([
        'salary'=> \App\Http\Controllers\SalaryController::class,
    ]);
});
