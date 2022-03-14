<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\curso\CursoController;
use App\Http\Controllers\inicio\HomeController;

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
});

Route::controller(CursoController::class)->group(function () {
    Route::get('/cursos', 'index')->name('cursos.index');

    Route::get('/cursos/create', 'create')->name('cursos.create');
    Route::post('/cursos', 'store')->name('cursos.store');

    Route::get('/cursos/edit/{curso}', 'edit')->name('cursos.edit');
    Route::put('/cursos/edit/{curso}', 'update')->name('cursos.update');

    Route::delete('/cursos/{curso}', 'destroy')->name('cursos.destroy');

    Route::get('/cursos/{curso}', 'show')->name('cursos.show');
});
//
