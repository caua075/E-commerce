<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;    

Route::get('/', [ProductController::class, 'index'])->name('home');

// Rotas dos produtos
Route::get('/products/create', [ProductController::class, 'create']);
Route::get('/dashboard', [ProductController::class, 'dashboard']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products/{id}/edit', [ProductController::class, 'edit']);
Route::put('/products/update/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

// Rotas de autenticação
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// Rotas Área Administrativa
Route::middleware(['auth', 'admin'])->group(function (){
    Route::get('/admin', function(){
        return view('admin.dashboard');
    });
});
