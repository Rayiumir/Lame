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
    $router
        ->get('/login', [
            \Rayium\Lame\Http\Controllers\auth\email\LoginController::class,
            'index',
        ])
        ->name('login');
    $router
        ->post('/login', [
            \Rayium\Lame\Http\Controllers\auth\email\LoginController::class,
            'store',
        ])
        ->name('auth.login.store');
    // Register User
    $router
        ->get('/register', [
            \Rayium\Lame\Http\Controllers\auth\email\RegisterController::class,
            'index',
        ])
        ->name('auth.register');
    $router
        ->post('/register', [
            \Rayium\Lame\Http\Controllers\auth\email\RegisterController::class,
            'store',
        ])
        ->name('auth.register.store');

    // Verify Email

    $router
        ->get('/verify/email', [
            \Rayium\Lame\Http\Controllers\auth\email\VerifyController::class,
            'view',
        ])
        ->name('verification.notice');
    $router
        ->get('/verify/email/{id}/{hash}', [
            \Rayium\Lame\Http\Controllers\auth\email\VerifyController::class,
            'verify',
        ])
        ->name('verification.verify')
        ->middleware(['auth', 'signed']);
    $router
        ->post('/verify/email/resend', [
            \Rayium\Lame\Http\Controllers\auth\email\VerifyController::class,
            'resend',
        ])
        ->name('verify.resend')
        ->middleware(['auth', 'throttle:5,1']);
});

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'verified']], function ($router) {
    // Admin
    $router
        ->get('/', [
            \Rayium\Lame\Http\Controllers\admin\AdminController::class,
            'index',
        ])
        ->name('admin.index')
        ->middleware('auth');

    // Logout
    $router
        ->get(
            '/logout',
            \Rayium\Lame\Http\Controllers\admin\LogoutController::class
        )
        ->name('auth.logout')
        ->middleware('auth');
});
