<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/users', [UserController::class, 'list'])->name('users.list');
Route::post('/users/save', [UserController::class, 'save'])->name('users.save');
Route::post('/users/datatable', [UserController::class, 'dataTable'])->name('users.datatable');
Route::get('/users/show/{id}', [UserController::class, 'show'])->name('users.show');
Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');
