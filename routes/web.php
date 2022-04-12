<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inicio\HomeController;
use App\Http\Livewire\Categories\Categories;

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
    Route::get('#', 'gato')->name('gato');
    ///
    Route::view('/acercade', 'principal.acercade')->name('acercade');
    Route::view('/contactanos', 'principal.contactanos')->name('contactanos');
    Route::post('/contactanos', 'enviar')->name('contactanos.enviar');

//
    Route::view('/dashboard', 'dashboard')->name('dashboard');
});

// Cursos
Route::resource('cursos', CursoController::class);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // users
    Route::resource('/dashboard/users', UserController::class);
    // categories
    Route::get('/dashboard/categories', Categories::class)->name('categories');
    // Route::get('dashboard/categories/{id}/posts', Categoryposts::class);

    Route::view('/tables', 'admin.user.tables.tables')->name('tables');

    Route::view('/banca', 'banca.index')->name('banca.index');
});
