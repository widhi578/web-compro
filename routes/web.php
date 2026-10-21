<?php

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\ContentController as AdminContentController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\PublicBlogController;
use Illuminate\Support\Facades\Route;

// Halaman yang dapat diakses pengunjung.
Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/services', 'services')->name('services');
Route::view('/gallery', 'gallery')->name('gallery');
Route::view('/contact', 'contact')->name('contact');
Route::get('/blog', [PublicBlogController::class, 'index'])->name('blog');
Route::view('/blog/alam-petualangan', 'blog.categories.alam-petualangan')->name('blog.nature');
Route::view('/blog/budaya-rasa-lokal', 'blog.categories.budaya-lokal')->name('blog.culture');
Route::view('/blog/tips-perjalanan', 'blog.categories.tips-perjalanan')->name('blog.tips');

// Rute masuk admin dan pengelolaan website.
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'create'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'store'])->middleware('throttle:6,1')->name('login.store');
    Route::post('/logout', [AdminAuthController::class, 'destroy'])->middleware('auth')->name('logout');

    // Halaman berikut hanya untuk admin yang sudah masuk.
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/', AdminDashboardController::class)->name('dashboard');
        Route::get('/konten/{page}', [AdminContentController::class, 'edit'])->name('content.edit');
        Route::put('/konten/{page}', [AdminContentController::class, 'update'])->name('content.update');
        Route::patch('/artikel/{article}/status', [AdminArticleController::class, 'toggleStatus'])->name('articles.status');
        Route::resource('/artikel', AdminArticleController::class)
            ->parameters(['artikel' => 'article'])
            ->except(['show'])
            ->names('articles');
    });
});
