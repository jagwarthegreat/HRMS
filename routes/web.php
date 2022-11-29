<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DocumentCategoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EmpCompensationHistoryController;
use App\Http\Controllers\EmpJobHistoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeDependentController;
use App\Http\Controllers\EmployeeEducationalBackgroundController;
use App\Http\Controllers\EmployeeStatusController;
use App\Http\Controllers\EmployeeTypeController;
use App\Http\Controllers\EmployeeWorkExperienceController;
use App\Http\Controllers\EmpStatusHistoryController;
use App\Http\Controllers\EmpTypeHistoryController;
use App\Http\Controllers\HiringRequirementController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\QuitClaimController;
use App\Http\Controllers\PayTypeController;
use App\Http\Controllers\PermisionController;
use App\Http\Controllers\Position;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use App\Models\Asset;
use App\Models\EmployeeEducationalBackground;
use App\Models\EmpStatusHistory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

session_start();
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
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    //     'appName' => config('app.name')
    // ]);
    return redirect('/login');
})->name('welcome');

Route::get('/dashboard', function () {
    $_SESSION['Employee']['tab']['active'] = "generalInfo";
    $_SESSION['Client']['tab']['active'] = "generalInfo";
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

    // profile
    Route::get('/profile', [UserProfileController::class, 'index'])->name('user.profile');
    Route::post('/profile/update/{id}', [UserProfileController::class, 'update'])->name('user.profile.update');
});

// EMPLOYEE MANAGEMENT
Route::prefix('employee')->middleware('auth')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('employee');
    Route::get('/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/store', [EmployeeController::class, 'store'])->name('employee.store');
    Route::post('/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::get('/{id}', [EmployeeController::class, 'show'])->name('employee.show');
    Route::post('/tabSwitchTo/{tabName}', function ($tabName) {
        $_SESSION['Employee']['tab']['active'] = $tabName;
    })->name('employee.tabSwitchTo');

    // general tab add
    Route::post('/dependent/store', [EmployeeDependentController::class, 'store'])->name('employee.dependent.store');
    Route::delete('/dependent/destroy/{id}', [EmployeeDependentController::class, 'destroy'])->name('employee.dependent.destroy');

    Route::post('/educbg/store', [EmployeeEducationalBackgroundController::class, 'store'])->name('employee.educbg.store');
    Route::delete('/educbg/destroy/{id}', [EmployeeEducationalBackgroundController::class, 'destroy'])->name('employee.educbg.destroy');

    Route::post('/workexp/store', [EmployeeWorkExperienceController::class, 'store'])->name('employee.workexp.store');
    Route::delete('/workexp/destroy/{id}', [EmployeeWorkExperienceController::class, 'destroy'])->name('employee.workexp.destroy');

    // job tab updates
    Route::post('/status/history/store', [EmpStatusHistoryController::class, 'store'])->name('employee.statushistory.store');
    Route::post('/type/history/store', [EmpTypeHistoryController::class, 'store'])->name('employee.typehistory.store');
    Route::post('/compensation/history/store', [EmpCompensationHistoryController::class, 'store'])->name('employee.compensationhistory.store');
    Route::post('/jobinfo/history/store', [EmpJobHistoryController::class, 'store'])->name('employee.jobinfohistory.store');
});

// ASSETS
Route::prefix('asset')->middleware('auth')->group(function () {
    Route::get('/', [AssetController::class, 'index'])->name('asset');
    Route::get('/create', [AssetController::class, 'create'])->name('asset.create');
    Route::post('/store', [AssetController::class, 'store'])->name('asset.store');
});

// POSITION / DESIGNATION
Route::prefix('position')->middleware('auth')->group(function () {
    Route::get('/', [PositionController::class, 'index'])->name('position');
    Route::post('/store', [PositionController::class, 'store'])->name('position.store');
    Route::delete('/destroy/{id}', [PositionController::class, 'destroy'])->name('position.destroy');
});

// DOCUMENTS
Route::prefix('docs')->middleware('auth')->group(function () {
    Route::post('/store', [DocumentController::class, 'store'])->name('docs.store');
});

// DEPARTMENT
Route::prefix('department')->middleware('auth')->group(function () {
    Route::get('/', [DepartmentController::class, 'index'])->name('department');
    Route::post('/store', [DepartmentController::class, 'store'])->name('department.store');
    Route::delete('/destroy/{id}', [DepartmentController::class, 'destroy'])->name('department.destroy');
});

// LOCATION
Route::prefix('location')->middleware('auth')->group(function () {
    Route::get('/', [LocationController::class, 'index'])->name('location');
    Route::post('/store', [LocationController::class, 'store'])->name('location.store');
    Route::delete('/destroy/{id}', [LocationController::class, 'destroy'])->name('location.destroy');
});

// DEPLOYMENT
Route::prefix('deployment')->middleware('auth')->group(function () {
    Route::get('/', [LocationController::class, 'index'])->name('deployment');
    // Route::post('/store', [LocationController::class, 'store'])->name('deployment.store');
    // Route::delete('/destroy/{id}', [LocationController::class, 'destroy'])->name('deployment.destroy');
});

// RECRUITMENT
Route::prefix('job')->middleware('auth')->group(function () {
    Route::get('/vacancy', [PositionController::class, 'index'])->name('job.vacancy');
    Route::get('/applicants', [PositionController::class, 'create'])->name('job.applicants');
});

// MEMOS
Route::prefix('memo')->middleware('auth')->group(function () {
    Route::get('/', [MemoController::class, 'index'])->name('memo');
    Route::post('/store', [MemoController::class, 'store'])->name('memo.store');
    Route::delete('/destroy/{id}', [MemoController::class, 'destroy'])->name('memo.destroy');
});

// QUIT CLAIMS
Route::prefix('quitclaims')->middleware('auth')->group(function () {
    Route::get('/', [QuitClaimController::class, 'index'])->name('quitclaims');
    Route::post('/store', [QuitClaimController::class, 'store'])->name('quitclaims.store');
    Route::delete('/destroy/{id}', [QuitClaimController::class, 'destroy'])->name('quitclaims.destroy');
});

// CLIENTS
Route::prefix('client')->middleware('auth')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('client');
    Route::get('/create', [ClientController::class, 'create'])->name('client.create');
    Route::post('/store', [ClientController::class, 'store'])->name('client.store');
    Route::get('/{id}', [ClientController::class, 'show'])->name('client.show');

    Route::post('/tabSwitchTo/{tabName}', function ($tabName) {
        $_SESSION['Client']['tab']['active'] = $tabName;
    })->name('client.tabSwitchTo');

    Route::post('/docs/store', [ClientController::class, 'docsstore'])->name('client.docs.store');
    Route::delete('/location/destroy/{id}', [ClientController::class, 'destroy'])->name('client.location.destroy');
});

// SETTINGS
Route::prefix('settings')->middleware('auth')->group(function () {

    Route::prefix('employee/statuses')->group(function () {
        Route::get('/', [EmployeeStatusController::class, 'index'])->name('settings.emp.statuses');
        Route::post('/store', [EmployeeStatusController::class, 'store'])->name('settings.emp.statuses.store');
        Route::delete('/destroy/{id}', [EmployeeStatusController::class, 'destroy'])->name('settings.emp.statuses.destroy');
    });

    Route::prefix('employee/types')->group(function () {
        Route::get('/', [EmployeeTypeController::class, 'index'])->name('settings.emp.types');
        Route::post('/store', [EmployeeTypeController::class, 'store'])->name('settings.emp.types.store');
        Route::delete('/destroy/{id}', [EmployeeTypeController::class, 'destroy'])->name('settings.emp.types.destroy');
    });

    Route::prefix('compensation/types')->group(function () {
        Route::get('/', [PayTypeController::class, 'index'])->name('settings.compensation.types');
        Route::post('/store', [PayTypeController::class, 'store'])->name('settings.compensation.types.store');
        Route::delete('/destroy/{id}', [PayTypeController::class, 'destroy'])->name('settings.compensation.types.destroy');
    });

    Route::prefix('document/category')->group(function () {
        Route::get('/', [DocumentCategoryController::class, 'index'])->name('settings.doc.category');
        Route::post('/store', [DocumentCategoryController::class, 'store'])->name('settings.doc.category.store');
        Route::delete('/destroy/{id}', [DocumentCategoryController::class, 'destroy'])->name('settings.doc.category.destroy');
    });

    Route::prefix('hiring/requirements')->group(function () {
        Route::get('/', [HiringRequirementController::class, 'index'])->name('settings.requirement.category');
        Route::post('/store', [HiringRequirementController::class, 'store'])->name('settings.requirement.store');
        Route::delete('/destroy/{id}', [HiringRequirementController::class, 'destroy'])->name('settings.requirement.destroy');
    });
});

require __DIR__ . '/auth.php';
