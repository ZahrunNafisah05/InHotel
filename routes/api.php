<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\PembayaranController;

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



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/user', [AuthController::class, 'alluser']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('reservasi', AuthorController::class)->except('create', 'edit', 'show', 'index');
    Route::resource('kamars', KamarController::class)->except(
        ['create', 'edit']
    );
    
    Route::resource('reservasis', ReservasiController::class)->except(
        ['create', 'edit']
    );
    
    Route::resource('tipes', TipeController::class)->except(
        ['create', 'edit']
    );

    Route::resource('pembayarans', PembayaranController::class)->except(
        ['create', 'delete']
    );
});
