<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\back_office\DashboardController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\back_office\PostController;
use App\Http\Controllers\back_office\PostCategoryController;
use App\Http\Controllers\back_office\TagController;

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

    Route::controller(PostController::class)->group(function (){
        Route::get('/show-post','index')->name('show-post');
        Route::get('/create-post','create')->name('create-post');
        Route::post('/store-post','store')->name('store-post');
        Route::get('/edit-post/{slug}','edit')->name('edit-post');
        Route::post('/update-post/{id}','update')->name('update-post');
        Route::get('/delete-post','delete')->name('delete-post');

        Route::get('/get-post-tag','postTag')->name('tag-post');
        Route::get('/post-tag-data','postTagData')->name('post-tag-data');
        Route::get('/get-sub-category','getSubCategory')->name('post-sub-category');

    });

    Route::controller(PostCategoryController::class)->group(function (){

        Route::get('/show-category','index')->name('show-category');
        Route::get('/create-category','create')->name('create-category');
        Route::post('/store-category','store')->name('store-category');
        Route::get('/edit-category/{slug}','edit')->name('edit-category');
        Route::post('/update-category/{slug}','update')->name('update-category');
        Route::get('/delete-category','delete')->name('delete-category');
    });

    Route::controller(TagController::class)->group(function (){

        Route::get('/show-tag','index')->name('show-tag');
        Route::post('/store-tag','store')->name('store-tag');
        Route::get('/edit-tag/{slug}','edit')->name('edit-tag');
        Route::post('/update-tag/{id}','update')->name('update-tag');
        Route::get('/delete-tag','delete')->name('delete-tag');
    });

});


