<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
///////////////
/*PAGE ROUTES*/
//////////////
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
Route::get('/register/vendor', [PageController::class, 'registerPage']);
// Post Routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


///////////////
/*SHOP ROUTES*/
//////////////
