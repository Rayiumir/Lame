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

Route::middleware('guest')->group(static function ($router) {
        $router->get('/login', [\Rayium\Lame\Http\Controllers\auth\LoginController::class, 'index']);
        $router->get('/register', [\Rayium\Lame\Http\Controllers\auth\RegisterController::class, 'index']);
});
