<?php

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

Route::get('/', [App\Http\Controllers\FrontPageController::class, 'index'])->name('front');
Route::get('/search', [App\Http\Controllers\FrontPageController::class, 'search'])->name('search');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');

    Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{role}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
    Route::patch('/roles/{role}', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{role}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy');
    Route::get('/roles/{role}', [App\Http\Controllers\RoleController::class, 'show'])->name('roles.show');

    Route::get('/advertisement', [App\Http\Controllers\AdvertisementController::class, 'index'])->name('advert.index');
    Route::get('/advertisement/create', [App\Http\Controllers\AdvertisementController::class, 'create'])->name('advert.create');
    Route::post('/advertisement', [App\Http\Controllers\AdvertisementController::class, 'store'])->name('advert.store');
    Route::get('/advertisement/{advertisement}/edit', [App\Http\Controllers\AdvertisementController::class, 'edit'])->name('advert.edit');
    Route::patch('/advertisement/{advertisement}', [App\Http\Controllers\AdvertisementController::class, 'update'])->name('advert.update');
    Route::delete('/advertisement/{advertisement}', [App\Http\Controllers\AdvertisementController::class, 'destroy'])->name('advert.destroy');
});

Route::get('/advertisement/{advertisement}', [App\Http\Controllers\FrontPageController::class, 'show'])->name('advert.show');

