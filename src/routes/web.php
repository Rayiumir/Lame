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
use Rayium\Lame\Http\Controllers\AuthController;

$_namespace = '\Rayium\Lame\Http\Controllers';

Route::namespace($_namespace)->middleware('guest')->group(static function ($router) {
        $router->get('/auth', [AuthController::class, 'index']);
});
