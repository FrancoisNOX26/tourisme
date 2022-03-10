<?php

use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\SiteController;
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

Route::get('dashboard', [NavigationController::class, 'dashboard'])->name('dashboard');

Route::resource('permissions', PermissionsController::class)->middleware('auth');

Route::resource('roles', RolesController::class)->middleware('auth');

Route::resource('users', UsersController::class)->middleware('auth');

Route::resource('sites', SiteController::class)->middleware('auth');

Route::get('localization/{locale}', [NavigationController::class, 'language'])->name('langue');

Route::get('/', function () {
   return view('front.index');
});
