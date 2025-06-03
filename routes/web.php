<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\EmployController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;

Route::get('/', [PagesController::class, 'landing']);
Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup.form');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

Route::get('/signin', [AuthController::class, 'showSignin'])->name('login');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin');

Route::get('/contact', [PagesController::class, 'contact']);
Route::post('/contact-submit', [PagesController::class, 'submitContact'])->name('submit.contact');

Route::get('/verify', [PagesController::class, 'VerifyForm']);
Route::post('/verify', [PagesController::class, 'VerifyCertificate'])->name('certificate.verify');

Route::get('/trainings', [PagesController::class, 'trainings'])->name('trainings');
Route::get('/services', [PagesController::class, 'services']);

Route::get('/blog', [PagesController::class, 'blog']);
Route::get('/about', [PagesController::class, 'about']);

// Login User Routes
Route::get('/enroll-training/{training_id}', [PagesController::class, 'enroll_training'])->name('training.enroll');
Route::get('/certification', [PagesController::class, 'enrollment_status'])->name('certification.status');
Route::get('/download-certificate/{id}', [PagesController::class, 'downloadCertificate'])->name('certificate.download');

Route::middleware('auth')->post('/signout', [AuthController::class, 'signout'])->name('signout');

// ADMIN ROUTES
Route::middleware(['auth', 'check.role:admin'])->prefix('admin')->group(function () {
    Route::get('/financial-management', [AdminController::class, 'financialManagement'])->name('admin.financial.management');
    Route::post('/finance/store', [AdminController::class, 'storeFinancialRecord'])->name('admin.finance.store');
    Route::get('/client-record', [AdminController::class, 'client']);
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/contact', [AdminController::class, 'contact'])->name('admin.contact.list');

    Route::get('/services', [AdminController::class, 'services'])->name('services.index');
    Route::post('/services', [AdminController::class, 'add_services'])->name('services.store');
    Route::delete('/services/{id}', [AdminController::class, 'delete_service'])->name('services.delete');

    Route::get('/trainings', [AdminController::class, 'trainings'])->name('trainings');
    Route::post('/trainings/add', [AdminController::class, 'add_training'])->name('add_training');
    Route::delete('/trainings/{id}', [AdminController::class, 'delete_training'])->name('trainings.delete');

    Route::get('/task-management', [AdminController::class, 'task_management'])->name('admin.task.management');
    Route::post('/task-store', [AdminController::class, 'store_task'])->name('admin.task.store');

    Route::get('/projects', [AdminController::class, 'project_management'])->name('admin.projects');
    Route::post('/projects/add', [AdminController::class, 'addProject'])->name('admin.project.add');

    Route::get('/enrollment', [AdminController::class, 'enrollment']);
    Route::put('/enrollment/mark-paid/{id}', [AdminController::class, 'markAsPaid'])->name('enrollment.markPaid');
    Route::get('/enrollment/{enroll_id}/complete', [AdminController::class, 'training_completion_form'])->name('admin.complete.form');
    Route::post('/certificate/store', [AdminController::class, 'training_completion_form_store'])->name('certificate.store');
});

// CLIENT ROUTES
Route::middleware(['auth', 'check.role:client'])->prefix('client')->name('client.')->controller(ClientController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/projects', 'projectList')->name('projects');
    Route::get('/projects/add', 'addProjectForm')->name('projects.add.form');
    Route::post('/projects/store', 'storeProject')->name('projects.store');

    Route::get('/message/{project_id}', 'messageForm')->name('message.form');
    Route::post('/message/send', 'sendMessage')->name('message.send');

    Route::get('/training/book', 'bookTrainingForm')->name('training.book.form');
    Route::post('/training/book', 'bookTraining')->name('training.book');
});

// EMPLOYEE ROUTES
Route::middleware(['auth', 'check.role:employee'])->prefix('employee')->group(function () {
    Route::get('/dashboard', [EmployController::class, 'dashboard']);
    Route::get('/projects', [EmployController::class, 'projects'])->name('employee.projects');
    Route::get('/tasks', [EmployController::class, 'tasks'])->name('employee.tasks');
    Route::get('/messages/{receiver_id}', [EmployController::class, 'messages'])->name('employee.messages');
    Route::post('/send-message', [EmployController::class, 'sendMessage'])->name('employee.send.message');
    Route::get('/finance', [EmployController::class, 'finance'])->name('employee.finance');
    Route::post('/finance/store', [EmployController::class, 'storeFinance'])->name('employee.finance.store');
});