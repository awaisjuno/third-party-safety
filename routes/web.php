<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\EmployController;
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

Route::get('/trainings', [PagesController::class, 'trainings'])->name('trainings');

Route::get('/services', [PagesController::class, 'services']);
Route::get('/book-service/{id}', [PageController::class, 'bookService'])->name('book_service');

Route::get('/blog', [PagesController::class, 'blog']);
Route::get('/about', [PagesController::class, 'about']);


Route::middleware('auth')->post('/signout', [AuthController::class, 'signout'])->name('signout');

Route::prefix('admin')->group(function () {

    Route::get('/financial-management', [AdminController::class, 'financialManagement'])->name('admin.financial.management');

    Route::get('/contact', [AdminController::class, 'contact'])->name('admin.contact.list');

    Route::get('/services', [AdminController::class, 'services'])->name('services.index');
    Route::post('/services', [AdminController::class, 'add_services'])->name('services.store');

    Route::get('/trainings', [AdminController::class, 'trainings'])->name('trainings');
    Route::post('/trainings/add', [AdminController::class, 'add_training'])->name('add_training');

    Route::get('/task-management', [AdminController::class, 'task_management'])->name('admin.task.management');
    Route::post('/task-store', [AdminController::class, 'store_task'])->name('admin.task.store');

    Route::get('/projects', [AdminController::class, 'project_management'])->name('admin.projects');
    Route::post('/projects/add', [AdminController::class, 'addProject'])->name('admin.project.add');

});

Route::middleware(['auth', 'role:client'])->prefix('client')->name('client.')->controller(ClientController::class)->group(function () {
    
    Route::get('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/projects', 'projectList')->name('projects');
    Route::get('/projects/add', 'addProjectForm')->name('project.add.form');
    Route::post('/projects/add', 'storeProject')->name('project.add');

    Route::get('/message/{project_id}', 'messageForm')->name('message.form');
    Route::post('/message/send', 'sendMessage')->name('message.send');

    Route::get('/training/book', 'bookTrainingForm')->name('training.book.form');
    Route::post('/training/book', 'bookTraining')->name('training.book');
});

Route::prefix('employee')->middleware('auth')->group(function () {
    
    Route::get('/dashboard', function () {
        return view('employee.dashboard');
    })->name('employee.dashboard');

    Route::get('/projects', [EmployController::class, 'projects'])->name('employee.projects');

    Route::get('/tasks', [EmployController::class, 'tasks'])->name('employee.tasks');

    Route::get('/messages/{receiver_id}', [EmployController::class, 'messages'])->name('employee.messages');
    Route::post('/send-message', [EmployController::class, 'sendMessage'])->name('employee.send.message');

    Route::get('/finance', [EmployController::class, 'finance'])->name('employee.finance');
});
