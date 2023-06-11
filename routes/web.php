<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DeleteAccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->to('/home');
});

Route::get('/register', [RegisterController::class, 'show']);

Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'show']);

Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LogoutController::class, 'logout']);

Route::get('/home', [HomeController::class, 'show']);

Route::get('/user', [UserController::class, 'show']);

Route::get('/user/edit', [UserController::class, 'edit']);

Route::put('/user', [UserController::class, 'update']);

Route::get('/user/destroy', [DeleteAccountController::class, 'show']);

Route::delete('/user', [DeleteAccountController::class, 'destroy']);

Route::get('/products', [ProductController::class, 'index']);

Route::get('/product/create', [ProductController::class, 'create']);

Route::post('/product', [ProductController::class, 'store']);

Route::get('/product/{id}', [ProductController::class, 'show']);

Route::get('/product/{id}/edit', [ProductController::class, 'edit']);

Route::put('/product/{id}', [ProductController::class, 'update']);

Route::get('/product/{id}/delete', [ProductController::class, 'delete']);

Route::delete('/product/{id}', [ProductController::class, 'destroy']);

Route::get('/menu', [MenuController::class, 'index']);

Route::get('/cart', [CartController::class, 'index']);

Route::post('/cart', [CartController::class, 'add']);