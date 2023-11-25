<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\back_office\DashboardController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\PermissionController;

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'loginPage')->name('login-page');
    Route::post('/login-user', 'login')->name('login');
    Route::get('/register', 'registerPage')->name('register-page');
    Route::post('/register-user', 'register')->name('register');
    Route::get('/log-out', 'logOut')->name('log-out');
});


Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    Route::controller(RoleController::class)->group(function (){
        Route::get('/show-role','index')->name('show-role');
        Route::post('/create-role','store')->name('create-role');
        Route::get('/edit-role','edit')->name('edit-role');
        Route::post('/update-role','update')->name('update-role');
        Route::get('/delete-role/{id}','delete')->name('delete-role');
        Route::get('/get-permission-details','getPermission')->name('get-permission');
    });
    Route::controller(PermissionController::class)->group(function (){
        Route::get('/show-permission','index')->name('show-permission');
        Route::post('/create-permission','store')->name('create-permission');
        Route::get('/edit-permission/{id}','edit')->name('edit-permission');
        Route::post('/update-permission/{id}','update')->name('update-permission');
        Route::get('/delete-permission/{id}','delete')->name('delete-permission');
    });
});


