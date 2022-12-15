<?php

use App\Http\Controllers\Dashboard\BoardController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\LogController;
use App\Http\Controllers\Dashboard\PaymentController;
use App\Http\Controllers\Dashboard\PortfolioController;
use App\Http\Controllers\Dashboard\ReportController;
use App\Http\Controllers\Dashboard\ReviewController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\TodoController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web Dashboard routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(
    [
        'prefix' => 'dashboard',
        'middleware' => ['auth', 'log']
    ],
    function () {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

        Route::get('/logs', [LogController::class, 'index'])->name('logs.index');

        Route::get('/buy-me-a-coffe', [PaymentController::class, 'test'])->name('payment.index');

        Route::get('/todos/complated/{id}', [TodoController::class, 'complated'])->name('todo.complated');

        Route::post('/report', [ReportController::class, 'index'])->name('report.index');

        Route::resources([
            'reviews'  => ReviewController::class,
            'boards'   => BoardController::class,
            'todos'    => TodoController::class,
            'logs'     => LogController::class,
        ]);
        Route::get('/logs/search/{id}', [LogController::class, 'search'])
            ->middleware(['role:admin'])
            ->name('log.search');

        // Role : admin
        Route::group(['middleware' => ['role:admin']], function () {
            Route::get('/logs/show', [LogController::class, 'show'])->name('logs.show');
            Route::resources([
                'roles' => RoleController::class,
                'users' => UserController::class,
            ]);
        });
    }
);
