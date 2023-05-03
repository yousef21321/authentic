<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\OrderController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index.home');

//Admin
Route::middleware(['auth', 'can:access-admin'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('index.admin');
});


/** profile */
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::PUT('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

/**Order  */
Route::get('/orders', [OrderController::class, 'index'])->name('orders'); //no output
Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/destroy', [OrderController::class, 'destroy'])->name('order.destroy');

/*Medicine */
Route::get('/medicines', [MedicineController::class, 'index'])->name('medicine');
Route::middleware(['auth', 'can:access-admin'])->group(function () {
    Route::get('/medicine/create', [MedicineController::class, 'create'])->name('medicine.create');
});
Route::post('/medicine/store', [MedicineController::class, 'store'])->name('medicine.store');
Route::get('/medicine/edit/{id}',[MedicineController::class,'edit'])->name('medicine.edit');
Route::get('/medicine/destroy', [MedicineController::class, 'destroy'])->name('medicine.destroy');
Route::delete('/medicine/{id}', [MedicineController::class, 'destroy'])->name('medicine.destroy');
Route::PUT('update/{id}', [MedicineController::class, 'update'])->name('medicine.update');
