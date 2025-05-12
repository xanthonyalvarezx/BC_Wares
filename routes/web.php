<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'landingPage']);
Route::get('/contact', [PageController::class, 'contactPage']);
