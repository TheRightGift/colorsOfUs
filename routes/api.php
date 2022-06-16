<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ColorController;
use App\Http\Controllers\API\ContactUSController;
use App\Http\Controllers\API\ImageController;
use App\Http\Controllers\API\NotificationController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\PromotionalController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\ShippinginfoController;
use App\Http\Controllers\API\SizeController;
use App\Http\Controllers\API\TrackingController;
use App\Http\Controllers\API\WishlistController;

use App\Http\Controllers\API\DBController;
 
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


Route::post('basic.auth0', [AuthController::class, 'register']);
Route::post('basic.auth1', [AuthController::class, 'adminRegister']);
Route::post('basic.auth3', [AuthController::class, 'sAdminRegister']);
Route::get('basic.verify/{code}', [AuthController::class, 'verifyEmail']);

Route::post('forgot-password', [AuthController::class, 'forgetPass'])->middleware('guest');
Route::post('reset-password', [AuthController::class, 'resetPass'])->middleware('guest');

Route::resource('blog', BlogController::class, ['only' => ['published', 'show']]);
Route::resource('category', CategoryController::class, ['only' => ['index', 'show']]);
Route::resource('color', ColorController::class, ['only' => ['index', 'show']]);
Route::resource('product', ProductController::class, ['only' => ['index', 'show']]);
Route::resource('promotion', PromotionalController::class, ['only' => ['index', 'show']]);
Route::resource('size', SizeController::class, ['only' => ['index', 'show']]);


Route::middleware('auth:sanctum')->group(function () {
    // Basic Auth :: Password Change;
    Route::patch('change-password', [AuthController::class, 'changePassword']);
    Route::get('statelgas', [DBController::class, 'index'])->withoutMiddleware(['auth:sanctum']);
    Route::get('compactview', [DBController::class, 'show'])->withoutMiddleware(['auth:sanctum']);
    Route::get('customer-home', [DBController::class, 'user'])->withoutMiddleware(['auth:sanctum']);
    Route::get('search/{query}', [DBController::class, 'search'])->withoutMiddleware(['auth:sanctum']);
    
    // Admin;
    Route::resource('admin', AdminController::class, ['only' => ['index', 'show', 'update', 'destroy']]);
    Route::get('admin-home', [AdminController::class, 'home']);
    Route::patch('admin-refresh/{id}', [AdminController::class, 'refresh']);
    
    // Blog;
    Route::resource('blog', BlogController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
    Route::patch('blog-refresh/{id}', [BlogController::class, 'refresh']);
    
    // Category;
    Route::resource('category', CategoryController::class, ['only' => ['store', 'update', 'destroy']]);
    Route::patch('category-refresh/{id}', [CategoryController::class, 'refresh']);
    Route::post('category-link', [CategoryController::class, 'categoryLinks']);
    
    // Color;
    Route::resource('color', ColorController::class, ['only' => ['store', 'update', 'destroy']]);
    Route::patch('color-refresh/{id}', [ColorController::class, 'refresh']);
    
    // Notify
    Route::post('notify-cancel', [NotificationController::class, 'notifyCancel']);
    Route::put('notify/{id}', [NotificationController::class, 'markRead']);
    Route::get('notify', [NotificationController::class, 'index']);
    Route::get('notify-prdmin', [NotificationController::class, 'prdMin']);

    // Order;
    Route::apiResource('order', OrderController::class);
    Route::get('order-home', [OrderController::class, 'home']);
    Route::patch('order-refresh/{id}', [OrderController::class, 'refresh']);
    Route::put('markFinished/{id}', [OrderController::class, 'markFinished']);
    Route::get('myOrders/{id}', [OrderController::class, 'myOrders']);
    
    // Product;
    Route::resource('product', ProductController::class, ['only' => 'store']);
    Route::put('product/{id}', [ProductController::class, 'update']);
    Route::delete('product/{id}', [ProductController::class, 'destroy']);
    Route::patch('product-refresh/{id}', [ProductController::class, 'refresh']);
    
    // Profile;
    Route::apiResource('profile', ProfileController::class);
    Route::patch('profile-refresh/{id}', [ProfileController::class, 'refresh']);
    
    // Promotion;
    Route::resource('promotion', PromotionalController::class, ['only' => ['store', 'update', 'destroy']]);
    Route::patch('promotion-refresh/{id}', [PromotionalController::class, 'refresh']);
    Route::post('removepromo-product', [PromotionalController::class, 'remove']);

    
    // Role;
    Route::apiResource('role', RoleController::class);
    Route::post('assignRole', [AdminController::class, 'assign']);
    // ShippingAddress
    Route::apiResource('shipping', ShippinginfoController::class);
    Route::patch('shipping-refresh/{id}', [ShippinginfoController::class, 'refresh']);
    
    // Size;
    Route::resource('size', SizeController::class, ['only' => ['store', 'update', 'destroy']]);
    Route::patch('size-refresh/{id}', [SizeController::class, 'refresh']);
    
    // Tracking;
    Route::apiResource('tracking', TrackingController::class);
    
    Route::post('uploads', [ImageController::class, 'postImageUploader']);
    
    // Wishlist;
    Route::resource('wishlist', WishlistController::class, ['only' => ['store', 'destroy', 'show']]);
    Route::get('user-wishlist/{id}', [WishlistController::class, 'home']);

});

// Blog;
Route::get('blog-published', [BlogController::class, 'published']);

// CONTACT US
Route::get('contact-us', [ContactUSController::class, 'contactUS']);
Route::post('contact-us', [ContactUSController::class, 'contactSaveData']);

// Product;
Route::get('product-sort/{sort}', [ProductController::class, 'sort']);
Route::post('product-filter/', [ProductController::class, 'filter']);
Route::get('product-home', [ProductController::class, 'home']);