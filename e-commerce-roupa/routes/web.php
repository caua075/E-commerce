<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', [ProductController::class, 'index'])->name('home');

// Rotas dos produtos
Route::middleware(AdminMiddleware::class)->group(function(){
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/update/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
});
Route::get('/products/{id}', [ProductController::class, 'show']);


// Rotas de autenticação
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// Rotas Área Administrativa
Route::middleware(AdminMiddleware::class)->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/productsDashboard', [AdminController::class, 'productsDashboard'])->name('admin.productsDashboard');
    Route::get('/admin/usersDashboard', [AdminController::class, 'usersDashboard'])->name('admin.usersDashboard');
});