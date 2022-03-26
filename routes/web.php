<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inicio\HomeController;
use App\Http\Controllers\curso\CursoController;
use App\Http\Controllers\users\UserController;

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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::view('/welcome', 'welcome')->name('welcome');
    Route::view('/acercade', 'principal.nosotros')->name('nosotros');
    Route::view('/contactanos', 'principal.contactanos')->name('contactanos');
    Route::post('/contactanos', 'enviar')->name('contactanos.enviar');
});

// Cursos
Route::resource('cursos', CursoController::class);

// users
Route::resource('users', UserController::class);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::view('/tables', 'admin.user.tables.tables')->name('tables');
});
