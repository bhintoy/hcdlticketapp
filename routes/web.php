<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Users
Route::get('/users', [UserController::class, 'list'])->name('users.list');
Route::post('/users/save', [UserController::class, 'save'])->name('users.save');
Route::post('/users/datatable', [UserController::class, 'dataTable'])->name('users.datatable');
Route::get('/users/show/{id}', [UserController::class, 'show'])->name('users.show');
Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');

// Departments
Route::get('/departments', [DepartmentController::class, 'list'])->name('departments.list');
Route::post('/departments/save', [DepartmentController::class, 'save'])->name('departments.save');
Route::post('/departments/datatable', [DepartmentController::class, 'datatable'])->name('departments.datatable');
Route::get('/departments/show/{id}', [DepartmentController::class, 'show'])->name('departments.show');
Route::delete('/deparments/delete/{id}', [DepartmentController::class, 'destroy'])->name('departments.delete');
