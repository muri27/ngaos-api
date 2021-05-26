<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\PengajarController;
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
Route::prefix('v1')->group(function(){
    Route::resource('/kelas', KelasController::class);
    Route::get('/kelas/search/{name}', [KelasController::class, 'search']);
    Route::resource('/pengajar', PengajarController::class);
    Route::get('/pengajar/search/{name}', [PengajarController::class, 'search']);
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
