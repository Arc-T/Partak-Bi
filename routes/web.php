<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\IndicatorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CompanyGroupController;
use App\Http\Controllers\Admin\CompanyDatabaseController;
use App\Http\Controllers\Admin\CompanyGroupsIndicatorController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
#############################################################
use App\Http\Controllers\Company\ReportsController;
use App\Http\Controllers\Company\Auth\LoginController as CompanyLoginController;
use App\Http\Controllers\Company\DashboardController as CompanyDashboardController;
use App\Http\Controllers\Company\IndicatorController as CompanyIndicatorController;

// Routes for Companies

Route::domain('{subdomain}.localhost')
    ->middleware('check.subdomain')
    ->name('company.')
    ->group(function () {

        Route::get('/login', [CompanyLoginController::class, 'index'])->name('login');

        Route::get('/', [CompanyLoginController::class, 'index'])->name('login');

        Route::post('/login', [CompanyLoginController::class, 'login'])->name('auth');

        Route::post('/logout', [CompanyLoginController::class, 'logout'])->name('logout');

        Route::middleware(['company.session.controller'])->group(function () {

            Route::namespace('App\Http\Controllers\Company')->group(function () {

                Route::get('/dashboard', [CompanyDashboardController::class, 'index'])->name('dashboard.home');

                Route::resource('/indicators', CompanyIndicatorController::class)->only(['show','store']);

                Route::resource('/reports', ReportsController::class);
            });
        });
    });

##############################################   ADMIN     ###################################################

Route::domain('localhost')
    ->name('admin.')
    ->group(function () {

        Route::post('/login', [AdminLoginController::class, 'authenticate'])->name('auth');

        Route::get('/', [AdminLoginController::class, 'index'])->name('login');

        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

        Route::namespace('App\Http\Controllers\Admin')->group(function () {

            Route::middleware(['admin.session.controller'])->group(function () {

                Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

                Route::resource('/companies', CompanyController::class)->except('show');

                Route::resource('/companies-database', CompanyDatabaseController::class)->except('show');

                Route::resource('/companies-group', CompanyGroupController::class)->except('show');

                Route::resource('/companies-group-indicator', CompanyGroupsIndicatorController::class)->only(['edit', 'update']);

                Route::resource('/indicators', IndicatorController::class)->except('show');

                Route::resource('/users', UserController::class)->except('show');
            });
        });
    });

Route::fallback(function () {
    return view('common.404');
});
