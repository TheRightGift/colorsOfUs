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

// Unprotected User routes
Route::get('/cart', function () {
    return view('user.cart');
});

Route::get('/contact', function () {
    return view('user.contact');
});

Route::get('/about-us', function () {
    return view('user.aboutus');
});

Route::get('/products/{title}', function () {
    return view('user.product');
});

Route::get('/products', function () {
    return view('user.products');
});

Route::get('/blogs', function () {
    return view('user.blogs');
});

Route::get('/blog/{title}', function () {
    return view('user.blog');
});

Route::get('/categories', function () {
    return view('user.categories');
});

Route::get('/search', function () {
    return view('user.searchResults');
});


Route::middleware('auth')->group(function () {
    Route::get('/checkout', function () {
        return view('user.checkout');
    });

    Route::get('/admins', function () {
        return view('admin.adminview');
    });

    Route::get('/shipping-price', function () {
        return view('admin.shippingPrice');
    });

    Route::get('/profile', function () {
        return view('profile');
    })->middleware('auth');

    Route::get('/promotions', function () {
        return view('admin.promotions');
    });

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

    Route::get('/blogpost', function () {
        return view('admin.blogpost');
    });
});
