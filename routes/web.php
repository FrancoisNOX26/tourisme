<?php

use App\Http\Controllers\Admin\PermissionsController;
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

Route::get('signup', function () {
    return view('auth.signup');
});

Route::get('signin', function () {
    return view('auth.signin');
});

Route::get('forget', function () {
    return view('auth.layout');
});

Route::get('dashboard', [\App\Http\Controllers\NavigationController::class, 'dashboard'])->name('dashboard');

Route::resource('permissions', PermissionsController::class)->middleware('auth');

Route::get('localization/{locale}', [\App\Http\Controllers\NavigationController::class, 'language'])->name('langue');
