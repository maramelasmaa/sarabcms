<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
// Define the contact route
Route::view('/contact', 'contact')->name('contact');
