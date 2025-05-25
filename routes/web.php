<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AwsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\DashboardController;

Route::post('/test/aws', [AwsController::class, 'upload']);
///////////////
/*PAGE ROUTES*/
//////////////
Route::get('/test', [PageController::class, 'testPage']);
Route::get('/', [PageController::class, 'landingPage']);
Route::get('/contact', [PageController::class, 'contactPage']);
Route::get('/about', [PageController::class, 'aboutPage']);
Route::get('/vendors', [PageController::class, 'vendorPage']);
Route::get('/shop', [PageController::class, 'shopPage']);

///////////////
/*AUTH ROUTES*/
//////////////
// Get Routes
Route::get('/login', [PageController::class, 'loginPage'])->name('login');
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/customer/registration', [PageController::class, 'customerRegistrationPage']);
// Post Routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/register/customer', [AuthController::class, 'registerCustomer']);

////////////////////////
/*VENDOR DASH ROUTES*/
///////////////////////
Route::prefix('vendor')->middleware(['web', 'auth'])->group(
    function () {
        Route::get('/dashboard/{page}', [DashboardController::class, 'getPageData']);
        Route::get('/dashboard/settings', [DashboardController::class, 'settingsPage']);
        Route::post('/add/products', [DashboardController::class, 'addProduct']);
        Route::put('/edit/product/{id}', [DashboardController::class, 'editProduct']);
        Route::delete('/delete/product/{id}', [DashboardController::class, 'deleteProduct']);
    }
);
///////////////
/*SHOP ROUTES*/
//////////////
Route::prefix('shop')->group(
    function () {
        Route::get('/cart/get', [ShopController::class, 'getCart']);
        Route::get('/cart/add/{id}', [ShopController::class, 'addToCart']);
        Route::get('/cart/remove/{id}', [ShopController::class, 'removeFromCart']);
    }
);
