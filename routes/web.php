<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\gestionProductosController;
use Illuminate\Support\Facades\Route;

// Ruta de bienvenida
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Ruta del dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo de rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    // Perfil del usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Cambio de contraseña
    Route::post('/password/change', [UserController::class, 'changePassword'])->name('password.change');

    // Sección de ventas
    Route::get('/ventas', [VentasController::class, 'index'])->name('ventas');

    // Sección de gestion-productos
    Route::get('/gestionProductos', [gestionProductosController::class, 'index'])->name('gestionProductos');

    // Sección de inventario
    Route::get('/inventario', [InventarioController::class, 'index'])->name('inventario');

    // CRUD de usuarios
    Route::resource('users', UserController::class);
    
    Route::get('/favicon.ico', function () {
        return response()->noContent();
    });
});

// Rutas de autenticación generadas automáticamente
require __DIR__.'/auth.php';