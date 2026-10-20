<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/services', 'services')->name('services');
Route::view('/gallery', 'gallery')->name('gallery');
Route::view('/contact', 'contact')->name('contact');
Route::view('/blog', 'blog')->name('blog');
Route::view('/blog/alam-petualangan', 'blog.categories.alam-petualangan')->name('blog.nature');
Route::view('/blog/budaya-rasa-lokal', 'blog.categories.budaya-lokal')->name('blog.culture');
Route::view('/blog/tips-perjalanan', 'blog.categories.tips-perjalanan')->name('blog.tips');
