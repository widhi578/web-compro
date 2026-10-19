<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/services', 'services')->name('services');
Route::view('/gallery', 'gallery')->name('gallery');
Route::view('/contact', 'contact')->name('contact');
Route::view('/blog', 'blog')->name('blog');

Route::post('/contact', function () {
    return back()->with('status', 'Formulir kontak belum terhubung ke sistem pengiriman.');
})->name('contact.submit');
