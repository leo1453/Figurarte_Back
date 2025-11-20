
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

// Productos
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

// Favoritos
Route::get('/favorites', [FavoriteController::class, 'index']);
Route::post('/favorites/toggle', [FavoriteController::class, 'toggle']);

// Carrito
Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/add', [CartController::class, 'add']);
Route::delete('/cart/{id}', [CartController::class, 'remove']);
Route::delete('/cart', [CartController::class, 'clear']);

// Pedidos
Route::get('/orders', [OrderController::class, 'index']);
Route::post('/checkout', [OrderController::class, 'checkout']);
