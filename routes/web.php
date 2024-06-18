<?php

use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

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
// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/shop', function(){
//     return view('shop');
// })->name('showShop');

// Route::get('/showSearch/{apiName}', [SearchController::class, 'showSearch'])->name('showSearch');
// Route::post('/search/{apiName}', [SearchController::class, 'search'])->name('search');

Route::get('/registerPage', [UserController::class, 'create'])->name('registerPage');
Route::post('/register', [UserController::class, 'store'])->name('register');

Route::get('/loginPage', [UserController::class, 'showLogin'])->name('loginPage');
Route::post('/login', [UserController::class, 'login'])->name('login');



// use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\RegisterController;
// use App\Http\Controllers\SessionsController;
            

// Route::get('/', function () {return redirect('sign-in');})->middleware('guest');
// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
// Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
// Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
// Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
// Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
// Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
// Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
// Route::get('verify', function () {
// 	return view('sessions.password.verify');
// })->middleware('guest')->name('verify'); 
// Route::get('/reset-password/{token}', function ($token) {
// 	return view('sessions.password.reset', ['token' => $token]);
// })->middleware('guest')->name('password.reset');

// Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
// Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
// Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
// Route::group(['middleware' => 'auth'], function () {
// 	Route::get('billing', function () {
// 		return view('pages.billing');
// 	})->name('billing');
// 	Route::get('tables', function () {
// 		return view('pages.tables');
// 	})->name('tables');
// 	Route::get('rtl', function () {
// 		return view('pages.rtl');
// 	})->name('rtl');
// 	Route::get('virtual-reality', function () {
// 		return view('pages.virtual-reality');
// 	})->name('virtual-reality');
// 	Route::get('notifications', function () {
// 		return view('pages.notifications');
// 	})->name('notifications');
// 	Route::get('static-sign-in', function () {
// 		return view('pages.static-sign-in');
// 	})->name('static-sign-in');
// 	Route::get('static-sign-up', function () {
// 		return view('pages.static-sign-up');
// 	})->name('static-sign-up');
// 	Route::get('user-management', function () {
// 		return view('pages.laravel-examples.user-management');
// 	})->name('user-management');
// 	Route::get('user-profile', function () {
// 		return view('pages.laravel-examples.user-profile');
// 	})->name('user-profile');
// });
Route::get('/', function () {
    return view('index');
});

Route::get('/shop', function(){
    return view('shop');
})->name('showShop');
Route::get('/items', [ItemController::class, 'index']);

Route::get('/showSearch/{apiName}', [SearchController::class, 'showSearch'])->name('showSearch');
Route::post('/search/{apiName}', [SearchController::class, 'search'])->name('search');

Route::get('/registerPage', [UserController::class, 'create'])->name('registerPage');
Route::post('/register', [UserController::class, 'store'])->name('register');

Route::get('/loginPage', [UserController::class, 'showLogin'])->name('loginPage');
Route::post('/login', [UserController::class, 'login'])->name('login');



//#####################################################
//      ADMIN DASHBOARD ROUTES
//#####################################################

Route::get('/admin-dashboard', function () {return redirect('sign-in');})->middleware('guest');
Route::get('/home', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify'); 
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');

// Laravel examples routes
Route::group(['middleware' => 'auth'], function () {
    // Unique URIs for each route
	Route::get('new-item', function () {
		return view('pages.new-item');
	})->name('new-item');
	Route::post('create-item', [ItemController::class, 'store'])->name('create-item');

	Route::get('billing', function () {
		return view('pages.billing');
	})->name('billing');
	Route::get('tables', [DashboardController::class, 'getTables'])->name('tables');
	Route::get('virtual-reality', function () {
		return view('pages.virtual-reality');
	})->name('virtual-reality');
	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');
	Route::get('static-sign-in', function () {
		return view('pages.static-sign-in');
	})->name('static-sign-in');
	Route::get('static-sign-up', function () {
		return view('pages.static-sign-up');
	})->name('static-sign-up');
	Route::get('user-management', function () {
		return view('pages.laravel-examples.user-management');
	})->name('user-management');
	Route::get('user-profile', function () {
		return view('pages.laravel-examples.user-profile');
	})->name('user-profile');
});

