<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\LoanController as AdminLoanController;

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
    // User books listing
    Route::get('/books', [BooksController::class, 'index'])->name('books.index');
    // User loans
    Route::get('/loans', [LoanController::class, 'index'])->name('loans.index');
    Route::post('/loans/{id}/request-return', [LoanController::class, 'requestReturn'])->name('loans.requestReturn');
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
    Route::resource('loans', AdminLoanController::class)->only(['index', 'store', 'destroy']);
    Route::post('/loans/{id}/return', [AdminLoanController::class, 'returnBook'])->name('loans.return');
    Route::post('/loans/{id}/approve-return', [AdminLoanController::class, 'approveReturn'])->name('loans.approveReturn');
    Route::post('/loans/{id}/reject-return', [AdminLoanController::class, 'rejectReturn'])->name('loans.rejectReturn');
    
    // API routes for dropdowns in loans
    Route::get('/api/users/search', [AdminLoanController::class, 'getUsers'])->name('users.api.search');
    Route::get('/api/books/search', [AdminLoanController::class, 'getBooks'])->name('books.api.search');
});
