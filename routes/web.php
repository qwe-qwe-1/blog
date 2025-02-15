<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'posts']);
Route::get('/grid', [PageController::class, 'grid']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/{slug?}', [PageController::class, 'post']);
Route::get('/page/{page?}', [PageController::class, 'posts']);
