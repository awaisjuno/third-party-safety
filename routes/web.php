<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminController;

Route::get('/', [PagesController::class, 'landing']);
Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup.form');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

Route::get('/signin', [AuthController::class, 'showSignin'])->name('signin.form');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin');

Route::get('/contact', [PagesController::class, 'contact']);
Route::post('/contact-submit', [PagesController::class, 'submitContact'])->name('submit.contact');

Route::get('/verify', [PagesController::class, 'VerifyForm']);
Route::post('/verify', [PagesController::class, 'verifyCertificate'])->name('certificate.verify');

Route::get('/services', [PagesController::class, 'services']);
Route::get('/book-service/{id}', [PageController::class, 'bookService'])->name('book_service');

Route::get('/blog', [PagesController::class, 'blog']);

Route::middleware('auth')->post('/signout', [AuthController::class, 'signout'])->name('signout');

Route::prefix('admin')->group(function () {

    Route::get('/financial-management', [AdminController::class, 'financialManagement'])->name('admin.financial.management');

    Route::get('/contact', [AdminController::class, 'contact'])->name('admin.contact.list');

    Route::get('/services', [AdminController::class, 'services'])->name('services.index');
    Route::post('/services', [AdminController::class, 'add_services'])->name('services.store');

    Route::get('/trainings', [AdminController::class, 'trainings'])->name('trainings');
    Route::post('/trainings/add', [AdminController::class, 'add_training'])->name('add_training');

    Route::get('task-management', [AdminController::class, 'task_management'])->name('admin.task.management');
    Route::post('/task-store', [AdminController::class, 'store_task'])->name('admin.task.store');


});