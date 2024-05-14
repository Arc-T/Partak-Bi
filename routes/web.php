<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Partak\UserController;
use App\Http\Controllers\Partak\CompanyController;
use App\Http\Controllers\Partak\IndicatorController;
use App\Http\Controllers\Partak\DashboardController;
use App\Http\Controllers\Partak\CompanyGroupController;
use App\Http\Controllers\Partak\Auth\LoginController as PartkaLoginController;
#############################################################
use App\Http\Controllers\Company\CustomersController;
use App\Http\Controllers\Company\Auth\LoginController as CompanyLoginController;
use App\Http\Controllers\Partak\CompanyGroupsIndicatorController;
use App\Http\Controllers\Partak\CompanyDatabaseController;
use App\Http\Controllers\testController;

// Routes for Companies

Route::domain('{subdomain}.localhost')
    ->middleware('check.subdomain')
    ->name('company.')
    ->group(function () {

        Route::get('/login',    [CompanyLoginController::class,  'index'])->name('login');

        Route::get('/',         [CompanyLoginController::class,  'index'])->name('login');

        Route::post('/login',   [CompanyLoginController::class,  'login'])->name('auth');

        Route::post('/logout',  [CompanyLoginController::class,  'logout'])->name('logout');

        Route::middleware(['company.session.controller'])->group(function () {

            Route::namespace('App\Http\Controllers\Company')->group(function () {

                Route::get('/dashboard',                        [App\Http\Controllers\Company\DashboardController::class, 'index'])->name('dashboard.home');

                Route::post('export/excel',                     [testController::class, 'export'])->name('export.excel');

                Route::prefix('indicators')->group(function () {

                    Route::get('/serivces',       [CustomersController::class, 'index'])->name('indicators.service');
                    Route::get('/modems',         [CustomersController::class, 'index'])->name('indicators.modem');
                    Route::get('/customers',      [CustomersController::class, 'index'])->name('indicators.customer');
                    Route::get('/staffs',         [CustomersController::class, 'index'])->name('indicators.staff');
                    Route::get('/custsdfsdfomers',[CustomersController::class, 'index'])->name('indicators.company_sales');
                    Route::get('/show-result',    [IndicatorController::class, 'show'])->name('indicator.result');

                });
            });
        });
    });


##############################################   PARTAK     ###################################################

Route::domain('localhost')
    ->name('partak.')
    ->group(function () {

        Route::post('/login',  [PartkaLoginController::class, 'authenticate'])->name('auth');

        Route::get('/',        [PartkaLoginController::class, 'index'])->name('login');

        Route::post('/logout', [PartkaLoginController::class, 'logout'])->name('logout');

        Route::namespace('App\Http\Controllers\Partak')->group(function () {

            Route::middleware(['partak.session.controller'])->group(function () {

                Route::get('/dashboard',        [DashboardController::class, 'index'])->name('dashboard');

                Route::resource('/companies',  CompanyController::class)->except('show');

                Route::resource('/companies-database' , CompanyDatabaseController::class)->except('show');

                Route::resource('/companies-group', CompanyGroupController::class)->except('show');

                Route::resource('/companies-group-indicator', CompanyGroupsIndicatorController::class)->only(['edit','update']);

                Route::resource('/indicators', IndicatorController::class)->except('show');

                Route::resource('/users' , UserController::class)->except('show');

            });
        });
    });

Route::fallback(function () {
    return view('common.404');
});
