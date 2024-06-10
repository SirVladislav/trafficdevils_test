<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('login');
});

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/main', [UserController::class, 'showMainPage'])->name('main')->middleware('auth');

Route::post('/order', [UserController::class, 'addOrder']);
Route::put('/order/{id}', [UserController::class, 'editOrder']);
Route::delete('/order/{id}', [UserController::class, 'deleteOrder']);
