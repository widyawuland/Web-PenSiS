<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SiswaController;
use App\Http\Controllers\Api\LoginController;
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

// // API untuk User Toko
// Route::middleware(['auth:api'])->group(function () {
//     Route::apiResource('toko-users', TokoUserController::class);
// });


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource("/siswa", SiswaController::class);
    
});

//route untuk login & logout api
Route::post("/Login",[LoginController::class,"Login"]);
Route::post("/Logout",[LoginController::class,"Logout"]);