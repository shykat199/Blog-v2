<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;

Route::controller(HomeController::class)->group(function (){
   Route::get('/','index')->name('home');
   Route::get('news-details/{slug}','newsDetails')->name('news-details');
   Route::get('category-details/{slug}','categoryDetails')->name('category-details');
   Route::get('tag-details/{slug}','tagDetails')->name('tag-details');
});
