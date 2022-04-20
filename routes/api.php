<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ColorController;
use App\Http\Controllers\API\ImageController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\PromotionalController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\ShippinginfoController;
use App\Http\Controllers\API\SizeController;
use App\Http\Controllers\API\TrackingController;
use App\Http\Controllers\API\WishlistController;

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
Route::post('basic.auth2', [AuthController::class, 'sAdminRegister']);
Route::post('basic.verify/{code}', [AuthController::class, 'verifyEmail']);

Route::post('forgot-password', [AuthController::class, 'forgetPass'])->middleware('guest');
Route::post('reset-password', [AuthController::class, 'resetPass'])->middleware('guest');

Route::resource('blog', BlogController::class, ['only' => ['published', 'show']]);
Route::resource('category', CategoryController::class, ['only' => ['index', 'show']]);
Route::resource('color', ColorController::class, ['only' => ['index', 'show']]);
Route::resource('product', ProductController::class, ['only' => ['index', 'show']]);
Route::resource('promotion', PromotionalController::class, ['only' => ['show']]);
Route::resource('size', SizeController::class, ['only' => ['index', 'show']]);

Route::middleware('auth:sanctum')->group(function () {
    // Basic Auth :: Password Change;
    Route::patch('change-password', [AuthController::class, 'changePassword']);
    
    // Admin;
    Route::resource('admin', AdminController::class, ['only' => ['index', 'show', 'update', 'destroy']]);
    Route::get('admin-home', [AdminController::class, 'home']);
    Route::patch('admin-refresh', [AdminController::class, 'refresh']);
    
    // Blog;
    Route::resource('blog', BlogController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
    Route::patch('blog-refresh', [BlogController::class, 'refresh']);
    Route::post('blog-image', [ImageController::class, 'postImageUploader']);

    // Category;
    Route::resource('category', CategoryController::class, ['only' => ['store', 'update', 'destroy']]);
    Route::patch('category-refresh', [CategoryController::class, 'refresh']);
    
    // Color;
    Route::resource('color', ColorController::class, ['only' => ['store', 'update', 'destroy']]);
    Route::patch('color-refresh', [ColorController::class, 'refresh']);
    
    // Order;
    Route::apiResource('order', OrderController::class);
    Route::get('order-home', [OrderController::class, 'home']);
    Route::patch('order-refresh', [OrderController::class, 'refresh']);

    // Product;
    Route::patch('product-refresh', [ProductController::class, 'refresh']);

    // Profile;
    Route::apiResource('profile', ProfileController::class);
    Route::patch('profile-refresh', [ProfileController::class, 'refresh']);

    // Promotion;
    Route::resource('promotion', PromotionalController::class, ['only' => ['store', 'update', 'destroy']]);
    Route::patch('promotion-refresh', [PromotionalController::class, 'refresh']);

    // Role;
    Route::apiResource('role', RoleController::class);

    // ShippingAddress
    Route::apiResource('shipping', ShippinginfoController::class);
    Route::patch('shipping-refresh', [ShippinginfoController::class, 'refresh']);

    // Size;
    Route::resource('size', SizeController::class, ['only' => ['store', 'update', 'destroy']]);
    Route::patch('size-refresh', [SizeController::class, 'refresh']);

    // Tracking;
    Route::apiResource('tracking', TrackingController::class);

    // Wishlist;
    Route::resource('wishlist', WishlistController::class, ['only' => ['index', 'store', 'destroy', 'show']]);
});

// Blog;
Route::get('blog-published', [BlogController::class, 'published']);

// Product;
Route::get('product/{sort}/{category}', [ProductController::class, 'sort']);
Route::post('product-filter/', [ProductController::class, 'filter']);
Route::get('product-home', [ProductController::class, 'home']);