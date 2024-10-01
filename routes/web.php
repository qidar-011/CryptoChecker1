<?php

use TCG\Voyager\Facades\Voyager;
// use TCG\Voyager\Voyager;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\TokenController;
use App\Http\Controllers\Website\AnalysisController;
use App\Http\Controllers\Website\NewlyListedCurrencyController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// مسارات لوحة التحكم باستخدام Voyager
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// مسارات الموقع
Route::namespace('App\Http\Controllers\Website')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('website.home');
    Route::get('/token/{id}', [TokenController::class, 'show'])->name('website.token.show');
    Route::post('/check-token', [AnalysisController::class, 'checkToken'])->name('website.checkToken');

    // فحص التوكين
    Route::post('/check-token', [HomeController::class, 'checkToken'])->name('token.check');

    Route::get('/newly-listed-currencies', [NewlyListedCurrencyController::class, 'index'])->name('website.newlyListedCurrencies.index');
    Route::get('/newly-listed-currencies/{id}', [NewlyListedCurrencyController::class, 'show'])->name('website.newlyListedCurrencies.show');
});

// مسارات لوحة التحكم باستخدام Voyager
// Voyager::routes();