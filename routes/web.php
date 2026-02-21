<?php

use App\Models\Project;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('home'));
Route::get('/portfolio', fn() => view('portfolio', ['projects' => Project::all()]));
Route::get('/contact', fn() => view('contact'));
