<?php

use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\PortfolioController;
use App\Http\Controllers\Frontend\ServiceController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/tentang-kami', fn () => app(PageController::class)->show('tentang-kami'))->name('about');
    Route::get('/visi-misi', fn () => app(PageController::class)->show('visi-misi'))->name('vision-mission');
    Route::get('/halaman/{slug}', [PageController::class, 'show'])->name('pages.show');

    Route::get('/layanan', ServiceController::class)->name('services.index');
    Route::get('/layanan/{slug}', ServiceController::class)->name('services.show');

    Route::get('/portofolio', [PortfolioController::class, 'index'])->name('portfolios.index');
    Route::get('/portofolio/{slug}', [PortfolioController::class, 'show'])->name('portfolios.show');

    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

    Route::get('/kontak', [ContactController::class, 'create'])->name('contact.create');
    Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');
});
