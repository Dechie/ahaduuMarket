<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/showSearch/{apiName}', [SearchController::class, 'showSearch'])->name('showSearch');
Route::post('/search/{apiName}', [SearchController::class, 'search'])->name('search');
Route::get('/shop', function(){
    return view('shop');
})->name('showShop');

