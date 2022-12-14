<?php

use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/send-review',ReviewController::class)->name('send-review');

//For multi Lang ...

// Route::group(
//     [
//         'prefix' => "{locale?}/dashboard",
//         'where' => ['locale' => '[a-zA-z]{2}'],
//         'middleware' => ['auth', 'log']
//     ],
//     function () {
//     }
// );


Auth::routes();
