<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'web'], function ($router) {
    // Login User
    $router->get('/login', [\Rayium\Lame\Http\Controllers\auth\email\LoginController::class, 'index'])->name('auth.login');
    $router->post('login', [\Rayium\Lame\Http\Controllers\auth\email\LoginController::class, 'store'])->name('auth.login.store');
    // Register User
    $router->get('register', [\Rayium\Lame\Http\Controllers\auth\email\RegisterController::class, 'index'])->name('auth.register');
    $router->post('register', [\Rayium\Lame\Http\Controllers\auth\email\RegisterController::class, 'store'])->name('auth.register.store');
});

Route::group(['prefix' => 'admin', 'middleware' => 'web'], static function ($router) {
    // Admin
    $router->get('/admin', [\Rayium\Lame\Http\Controllers\admin\AdminController::class, 'index'])->name('admin.index');
});

