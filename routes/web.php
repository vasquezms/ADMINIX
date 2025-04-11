<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

// Ruta principal
Route::get(uri: '/', action: fn() => redirect('/users'));

// Rutas CRUD para usuarios
Route::resource('users', UserController::class);

Route::resource('products', ProductController::class);
