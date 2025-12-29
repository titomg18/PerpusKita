<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\LoanController;

Route::get('/', function () {
    return redirect('/login');
});

/* AUTH ROUTES */
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProcess']);
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerProcess']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/* USER DASHBOARD */
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

/* ADMIN ROUTES */
Route::prefix('admin')->name('admin.')->middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Categories Routes - menggunakan Route Resource
    Route::resource('categories', CategoryController::class)->except(['show']);
    
    // API route untuk categories
    Route::get('/api/categories', [CategoryController::class, 'getCategories'])
        ->name('categories.api');
    
    // Books Routes - menggunakan Route Resource
    Route::resource('books', BookController::class)->except(['show']);
    
    // API route untuk books
    Route::get('/api/books', [BookController::class, 'getBooks'])
        ->name('books.api');

    // Loan Routes
    Route::resource('loans', LoanController::class)->only(['index', 'store', 'destroy']);
    Route::post('/loans/{id}/return', [LoanController::class, 'returnBook'])->name('loans.return');
    
    // API routes for dropdowns in loans
    Route::get('/api/users/search', [LoanController::class, 'getUsers'])->name('users.api.search');
    Route::get('/api/books/search', [LoanController::class, 'getBooks'])->name('books.api.search');
});
