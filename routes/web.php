<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
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
// Post Routes
Route::post('/loginVendor', [AuthController::class, 'loginVendor']);
Route::post('/loginCustomer', [AuthController::class, 'loginCustomer']);
Route::post('/register', [AuthController::class, 'register']);


///////////////
/*SHOP ROUTES*/
//////////////
