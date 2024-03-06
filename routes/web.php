<?php

use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('index');
});

Route::get('/shop', function(){
    return view('shop');
})->name('showShop');

Route::get('/showSearch/{apiName}', [SearchController::class, 'showSearch'])->name('showSearch');
Route::post('/search/{apiName}', [SearchController::class, 'search'])->name('search');

Route::get('/registerPage', [UserController::class, 'create'])->name('registerPage');
Route::post('/register', [UserController::class, 'store'])->name('register');

Route::get('/loginPage', [UserController::class, 'showLogin'])->name('loginPage');
Route::post('/login', [UserController::class, 'login'])->name('login');


