<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
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
Route::post('registerUser', [UserController::class, 'store']);
Route::middleware('auth:sanctum')->group(function(){
    Route::get('/check-auth', [UserController::class, 'checkAuth']);
    Route::post('/login', [UserController::class, 'login'])->name('login');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/showSearch/{apiName}', [SearchController::class, 'showSearch'])->name('showSearch');
Route::post('/search/{apiName}', [SearchController::class, 'search'])->name('search');

Route::get('/items', [ItemController::class, 'index']);
Route::get('/shop', function(){
    return view('shop');
})->name('showShop');
Route::post('/test', function (Request $request) {
    $query = $request->input('query');
    Log::info('Received test query:', ['query' => $query]);
    return response()->json(['message' => 'Test query received', 'query' => $query]);
})->middleware('check.cors');

