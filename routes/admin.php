<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SeoMetadataController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
    });

    Route::middleware('auth')->group(function () {
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

        Route::get('/', DashboardController::class)->name('dashboard');

        Route::resource('services', ServiceController::class)
            ->except(['show'])
            ->middleware('permission:manage services');
        Route::resource('portfolios', PortfolioController::class)
            ->except(['show'])
            ->middleware('permission:manage portfolios');
        Route::resource('team-members', TeamMemberController::class)
            ->except(['show'])
            ->middleware('permission:manage team');
        Route::resource('testimonials', TestimonialController::class)
            ->except(['show'])
            ->middleware('permission:manage testimonials');
        Route::resource('blog-posts', BlogPostController::class)
            ->except(['show'])
            ->middleware('permission:manage blog');
        Route::resource('messages', MessageController::class)
            ->only(['index', 'show', 'update', 'destroy'])
            ->middleware('permission:manage messages');
        Route::resource('pages', PageController::class)
            ->except(['show'])
            ->middleware('permission:manage pages');
        Route::resource('seo-metadata', SeoMetadataController::class)
            ->except(['show'])
            ->middleware('permission:manage seo');
        Route::resource('users', UserController::class)
            ->except(['show'])
            ->middleware('permission:manage users');

        Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    });
});
