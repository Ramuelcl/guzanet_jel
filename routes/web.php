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

Route::get('/', [HomeController::class,'index']);

Route::controller(CursoController::class)->group(function () {
    Route::get('/cursos', 'index');
    Route::get('/cursos/create', 'create');
    Route::get('/cursos/{curso}', 'show');
    Route::get('/cursos/{curso}/{categoria}', 'show');
    // Route::post('/cursos', 'store');
});
