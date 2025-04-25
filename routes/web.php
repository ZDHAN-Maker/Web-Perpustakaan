<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ReturnBookController;
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('books', BookController::class);
Route::resource('categories', CategoryController::class);
Route::resource('visitors', VisitorController::class);
Route::resource('borrowings', BorrowingController::class);
Route::resource('staff', StaffController::class);
Route::resource('return-books', ReturnBookController::class);
