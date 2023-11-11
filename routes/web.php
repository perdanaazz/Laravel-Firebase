<?php

use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return view('index');
});

Route::get('/', [LandingPageController::class, 'index']);
Route::get('/rtdb', [LandingPageController::class, 'indexRTDB']);
