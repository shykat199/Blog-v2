<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;

Route::controller(HomeController::class)->group(function (){
   Route::get('/','index')->name('home');
   Route::get('news-details/{slug}','newsDetails')->name('news-details');
   Route::get('category-details/{slug}','categoryDetails')->name('category-details');
   Route::get('tag-details/{slug}','tagDetails')->name('tag-details');
   Route::post('post-comment/{id}','postComment')->name('post-comment');
   Route::get('contact-us',function (){
       return view('frontend.contact');
   })->name('contact-us');

    Route::get('about-us',function (){
        return view('frontend.about');
    })->name('about-us');

    Route::get('privacy-policy',function (){
        return view('frontend.privacy');
    })->name('privacy-policy');

   Route::post('post-message','postMessage')->name('post-message');
});
