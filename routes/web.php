<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DashboardController;
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
Route::get('/login', [PageController::class, 'loginPage']);
Route::get('/logout', [AuthController::class, 'logout']);
// Post Routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


////////////////////////
/*VENDOR DASH ROUTES*/
///////////////////////
Route::prefix('vendor')->group(
    function () {
        Route::get('/dashboard/{page}', [DashboardController::class, 'getPageData']);
        Route::get('/dashboard/add/products', [DashboardController::class, 'addProductForm']);
        Route::get('/dashboard/settings', [DashboardController::class, 'settingsPage']);
    }
);


///////////////
/*SHOP ROUTES*/
//////////////
