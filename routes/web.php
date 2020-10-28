<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TravelDetailController;
use App\Http\Controllers\TravelPackageController;
use App\Http\Controllers\UserController;
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
Route::get('travel/lengkap/', [TravelPackageController::class, 'lengkap'])->name('travel.lengkap');
Route::get('travel/{slug}/detail', [TravelDetailController::class, 'index'])->name('travel.detail');

Auth::routes();

Route::group(['middleware' => ['auth','CheckRole:admin,staff']], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('travels', App\Http\Controllers\TravelPackageController::class);
    Route::get('travel', [TravelPackageController::class, 'expired'])->name('travel.expired');
    Route::get('travel/restore/{id}', [TravelPackageController::class, 'restore'])->name('travel.restore');
    Route::get('travel/restoreall', [TravelPackageController::class, 'restoreall'])->name('travel.restoreall');
    Route::get('travel/permanent/{id}', [TravelPackageController::class, 'permanent'])->name('travel.permanent');
    Route::get('travel/permanentall', [TravelPackageController::class, 'permanentall'])->name('travel.permanentall');
    Route::resource('galleries', App\Http\Controllers\GalleryController::class);

    Route::resource('transactions', App\Http\Controllers\TransactionController::class);
});

Route::group(['middleware' => ['auth','CheckRole:customer,staff,admin']], function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/history-travel', [ProfileController::class, 'history'])->name('history.travel');
    Route::get('user/{id}/change-password', [ProfileController::class, 'showchangePasword'])->name('user.change-password');
    Route::post('user/{id}/update-password', [ProfileController::class, 'changePasword'])->name('user.update-password');
    Route::post('user/{id}/account-setting', [ProfileController::class, 'accountSetting'])->name('user.account-setting');
    Route::get('user/testimonial', [ProfileController::class, 'ShowTestimonial'])->name('user.show-testimonial');
    Route::get('user/{id}/give-testimonial', [ProfileController::class, 'GiveTestimonial'])->name('user.give-testimonial');
    Route::post('user/{id}/post-testimonial', [ProfileController::class, 'PostTestimonial'])->name('user.post-testimonial');

    Route::get('/checkout/{id}', [CheckoutController::class, 'index'])->name('checkout');
    Route::get('/checkout/{idTravel}/proccess', [CheckoutController::class, 'proccess'])->name('checkout.proccess');
    Route::post('/checkout/{idTransaction}/create', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::get('/checkout/{id}/delete', [CheckoutController::class, 'delete'])->name('checkout.delete');
    Route::get('/checkout/{id}/success', [CheckoutController::class, 'success'])->name('checkout.success');
});
