<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookCategoryController as categoryCon;
use App\Http\Controllers\BookController as bookCon;

Route::get('/', function () {
    return view('welcome');
})->middleware('guest')->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::prefix('book')->name('b_')->group(function () {
    Route::get('/', [bookCon::class, 'index'])->name('index');
    Route::get('/create', [bookCon::class, 'create'])->name('create')->middleware('auth');
    Route::post('/create', [bookCon::class, 'store'])->name('store')->middleware('auth');
    Route::get('/show/{book}', [bookCon::class, 'show'])->name('show');
    Route::delete('/delete/{book}', [bookCon::class, 'destroy'])->name('delete')->middleware('auth');
    Route::get('/edit/{book}', [bookCon::class, 'edit'])->name('edit')->middleware('auth');
    Route::put('/edit/{book}', [bookCon::class, 'update'])->name('update')->middleware('auth');
    Route::post('/reserve/{book}', [bookCon::class, 'reserve'])->name('reserve')->middleware('auth');
    Route::post('/favorite/{book}', [bookCon::class, 'favorite'])->name('favorite')->middleware('auth');
});

Route::prefix('category')->name('c_')->group(function () {
    Route::get('/', [categoryCon::class, 'index'])->name('index');
    Route::get('/create', [categoryCon::class, 'create'])->name('create')->middleware('auth');
    Route::post('/create', [categoryCon::class, 'store'])->name('store')->middleware('auth');
    Route::get('/show/{category}', [categoryCon::class, 'show'])->name('show');
    Route::delete('/delete/{category}', [categoryCon::class, 'destroy'])->name('delete')->middleware('auth');
    Route::get('/edit/{category}', [categoryCon::class, 'edit'])->name('edit')->middleware('auth');
    Route::put('/edit/{category}', [categoryCon::class, 'update'])->name('update')->middleware('auth');
});