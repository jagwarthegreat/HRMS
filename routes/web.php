<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PermisionController;
use App\Http\Controllers\Position;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'appName' => config('app.name')
    ]);
    // return redirect('/login');
})->name('welcome');

Route::get('/dashboard', function () {
    $user = Auth::user();
    return Inertia::render('Dashboard', compact('user'));
})->middleware('auth')->name('dashboard');

// PERMISSIONS
Route::prefix('permission')->middleware('auth')->group(function () {
    Route::get('/', [PermisionController::class, 'index'])->name('permission');
    Route::get('/create', [PermisionController::class, 'create'])->name('permission.create');
    Route::post('/store', [PermisionController::class, 'store'])->name('permission.store');
});

// ROLES
Route::prefix('role')->middleware('auth')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('role');
    Route::get('/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/store', [RoleController::class, 'store'])->name('role.store');
});

// USER MANAGEMENT ROUTE
Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
});

// EMPLOYEE MANAGEMENT
Route::prefix('employee')->middleware('auth')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('employee');
    Route::get('/create', [EmployeeController::class, 'create'])->name('employee.create');
});

// POSITION
Route::prefix('position')->middleware('auth')->group(function () {
    Route::get('/', [PositionController::class, 'index'])->name('position');
    Route::get('/create', [PositionController::class, 'create'])->name('position.create');
    Route::post('/store', [PositionController::class, 'store'])->name('position.store');
});

// DOCUMENTS
Route::prefix('docs')->middleware('auth')->group(function () {
    Route::get('/employee', [PositionController::class, 'index'])->name('docs.employee');
    Route::get('/client', [PositionController::class, 'create'])->name('docs.client');
});

// DEPARTMENT
Route::prefix('department')->middleware('auth')->group(function () {
    Route::get('/', [PositionController::class, 'index'])->name('department');
});

// RECRUITMENT
Route::prefix('job')->middleware('auth')->group(function () {
    Route::get('/vacancy', [PositionController::class, 'index'])->name('job.vacancy');
    Route::get('/applicants', [PositionController::class, 'create'])->name('job.applicants');
});

// CLIENTS
Route::prefix('client')->middleware('auth')->group(function () {
    Route::get('/', [PositionController::class, 'index'])->name('client');
});

require __DIR__ . '/auth.php';
