<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShareController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/share', [ShareController::class, 'store']);


