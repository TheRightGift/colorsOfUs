<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');

Route::post('login', 'App\Http\Controllers\API\Auth\LoginController@authenticate')->name('auth');

Route::post('logout', 'App\Http\Controllers\API\Auth\LogoutController@logout')->name('logout');

Route::get('/home', function () {
    if (auth()->user()->user_type == 0) {
        return redirect('dashboard');
    }
    else if (auth()->user()->user_type == 1) {
        return redirect('admin');
    }
    else if (auth()->user()->user_type == 2) {
        return redirect('tech_admin');
    }
    else if (auth()->user()->user_type == 3) {
        return redirect('super');
    }
});

Route::get('/activate/{code}', function () {
    return view('user.activate');
});

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware('is_admin');

Route::get('/tech_admin', [App\Http\Controllers\TechAdminController::class, 'index'])->middleware('is_techadmin');

Route::get('/super', [App\Http\Controllers\SuperAdminController::class, 'index'])->middleware('is.superadmin');

Route::get('sbminbackoffice', function () {
    return view('admin.register');
});

Route::middleware('auth')->group(function () {
    Route::get('/admins', function () {
        return view('adminview');
    });

    Route::get('/profile', function () {
        return view('profile');
    })->middleware('auth');

    Route::get('/product', function () {
        return view('admin.product');
    });

    Route::get('/customer', function () {
        return view('admin.customers');
    });

    Route::get('/category', function () {
        return view('admin.category');
    });

    Route::get('/order', function () {
        return view('admin.orders');
    });

    Route::get('/message', function () {
        return view('admin.messages');
    });

    Route::get('/size', function () {
        return view('admin.size');
    });

    Route::get('/color', function () {
        return view('admin.color');
    });
});
