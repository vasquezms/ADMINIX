<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SupplyController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    // Dashboard (accesible para todos los autenticados)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // SOLO ADMINISTRADOR
    Route::middleware(['role:Administrador'])->group(function () {
        Route::resource('users', UserController::class);

        Route::prefix('roles')->name('roles.')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('index');
            Route::get('/create', [RoleController::class, 'create'])->name('create');
            Route::post('/', [RoleController::class, 'store'])->name('store');
            Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('edit');
            Route::put('/{role}', [RoleController::class, 'update'])->name('update');
            Route::delete('/{role}', [RoleController::class, 'destroy'])->name('destroy');
        });

        Route::get('roles/{role}/assign-users', [RoleController::class, 'showAssignUsers'])->name('roles.showAssignUsers');
        Route::post('roles/{role}/assign-users', [RoleController::class, 'assignUsers'])->name('roles.assignUsers');
    });

    // SOLO VENDEDOR (aquí puedes agregar rutas exclusivas para vendedores si lo deseas)
    Route::middleware(['role:Vendedor'])->group(function () {
        // Ejemplo: rutas exclusivas para vendedores
        // Route::get('/ventas/reportes', [SaleController::class, 'reportes'])->name('sales.reportes');
    });

    // Rutas accesibles para ambos (Administrador y Vendedor)
    Route::resource('products', ProductController::class);
    Route::resource('categorias', CategoriaController::class);

    // Ventas
    Route::prefix('sales')->name('sales.')->group(function () {
        Route::get('/', [SaleController::class, 'index'])->name('index');
        Route::get('/create', [SaleController::class, 'create'])->name('create');
        Route::post('/store', [SaleController::class, 'store'])->name('store');
        Route::get('/product/{id}', [SaleController::class, 'getProduct'])->name('product');
        Route::post('/validate-stock', [SaleController::class, 'validateStock'])->name('validateStock');
        Route::get('/{sale}', [SaleController::class, 'show'])->name('show');
        Route::delete('/{sale}', [SaleController::class, 'destroy'])->name('destroy');
    });

    // Abastecimiento
    Route::prefix('supplies')->name('supplies.')->group(function () {
        Route::get('/', [SupplyController::class, 'index'])->name('index');
        Route::get('/create', [SupplyController::class, 'create'])->name('create');
        Route::post('/store', [SupplyController::class, 'store'])->name('store');
        Route::get('/{supply}', [SupplyController::class, 'show'])->name('show');
        Route::delete('/{supply}', [SupplyController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__.'/auth.php';
