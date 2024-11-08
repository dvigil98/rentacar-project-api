<?php

use Illuminate\Support\Facades\Route;
use Src\Auth\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Rutas del modulo de autenticacion
|
*/

// login
Route::post('/api/auth/login', [AuthController::class, 'login']);

Route::middleware('jwt.verify')->group(function () {

    // logout
    Route::get('/api/auth/logout', [AuthController::class, 'logout']);
});
