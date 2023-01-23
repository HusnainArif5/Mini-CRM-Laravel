<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Auth::routes();

//....................................................Login Route.......................................................
Route::get('/', [HomeController::class, 'index'])->name('home');

//...............................................Role Admin & Auth Group................................................
Route::middleware(['role:ADMIN', 'auth'])->group(function () {

    //............................................Admin Password/email Update...........................................
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');

    //....................................................Admin Home....................................................
    Route::get('/admin/home', [HomeController::class, 'show'])->name('admin.home');

    //....................................................Companies CRUD................................................
    Route::get('/companies/index', [CompanyController::class, 'index'])->name('companies.index');
    Route::post('/companies/store', [CompanyController::class, 'store'])->name('companies.store');
    Route::get('/companies/edit/{id}', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::delete('/companies/delete/{id}', [CompanyController::class, 'destroy'])->name('companies.destroy');
    Route::post('/companies/update/{id}', [CompanyController::class, 'update'])->name('companies.update');

    //....................................................Employees CRUD................................................
    Route::get('/employees/index', [EmployeeController::class, 'index'])->name('employees.index');
    Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/edit/{id}', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::delete('/employees/delete/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
    Route::post('/employees/update/{id}', [EmployeeController::class, 'update'])->name('employees.update');
});
