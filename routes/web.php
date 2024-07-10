<?php

use Illuminate\Support\Facades\Route;
######################## Admin ###############################
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\IndicatorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CompanyGroupController;
use App\Http\Controllers\Admin\CompanyGroupsIndicatorController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
####################### User ##########################
use App\Http\Controllers\User\ReportsController;
use App\Http\Controllers\User\Auth\LoginController as CompanyLoginController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\IndicatorController as UserIndicatorController;

##############################################   User    ###################################################

Route::domain('{subdomain}.localhost')
    // ->middleware('check.subdomain')
    ->name('user.')
    ->group(function () {

        Route::get('/login', [CompanyLoginController::class, 'index'])->name('login');

        Route::get('/', [CompanyLoginController::class, 'index'])->name('login');

        Route::post('/login', [CompanyLoginController::class, 'login'])->name('auth');

        Route::post('/logout', [CompanyLoginController::class, 'logout'])->name('logout');

        Route::middleware(['user.session.controller'])->group(function () {

            Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard.home');

            Route::get('/indicators/{route}/{sub_route}', [UserIndicatorController::class, 'show']);

            Route::post('/indicators/{route}/{sub_route}', [UserIndicatorController::class, 'store']);

            Route::post('/indicators/{route}/{sub_route}/report', [ReportsController::class, 'store']);

            // Route::resource('/reports', ReportsController::class);
        });
    });

##############################################   ADMIN     ###################################################

Route::domain('localhost')
    ->name('admin.')
    ->group(function () {

        Route::post('/login', [AdminLoginController::class, 'authenticate'])->name('auth');

        Route::get('/', [AdminLoginController::class, 'index'])->name('login');

        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

        Route::middleware(['admin.session.controller'])->group(function () {

            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

            Route::resource('/companies', CompanyController::class)->except('show');

            Route::resource('/companies-group', CompanyGroupController::class)->except('show');

            Route::resource('/companies-group-indicator', CompanyGroupsIndicatorController::class)->only(['edit', 'update']);

            Route::resource('/indicators', IndicatorController::class)->except('show');

            Route::resource('/users', UserController::class)->except('show');
        });
    });

Route::fallback(function () {
    return view('common.404');
});
