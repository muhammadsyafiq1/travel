<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TravelPackageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('travels', App\Http\Controllers\TravelPackageController::class);
    Route::get('travel', [TravelPackageController::class, 'expired'])->name('travel.expired');
    Route::get('travel/restore/{id}', [TravelPackageController::class, 'restore'])->name('travel.restore');
    Route::get('travel/restoreall', [TravelPackageController::class, 'restoreall'])->name('travel.restoreall');
    Route::get('travel/permanent/{id}', [TravelPackageController::class, 'permanent'])->name('travel.permanent');
    Route::get('travel/permanentall', [TravelPackageController::class, 'permanentall'])->name('travel.permanentall');
    Route::resource('galleries', App\Http\Controllers\GalleryController::class);
});
