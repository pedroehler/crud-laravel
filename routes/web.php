<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('/');
    Route::get('index', 'index')->name('index');
    Route::get('home', 'index')->name('home');
    Route::get('laravel', 'laravel')->name('laravel');
});

Route::resource('usuarios', UsuariosController::class);