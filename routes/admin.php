<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\back_office\DashboardController;

Route::controller(AuthController::class)->group(function (){
   Route::get('/login','loginPage')->name('login-page');
   Route::get('/register','registerPage')->name('register-page');
});

Route::controller(DashboardController::class)->group(function (){
   Route::get('/dashboard','index')->name('dashboard');
});
