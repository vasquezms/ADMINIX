<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Ruta principal
Route::get(uri: '/', action: fn() => redirect('/users'));

// Rutas CRUD para usuarios
Route::resource('users', UserController::class);