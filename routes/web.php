<?php

use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\citaController;
use App\Http\Controllers\historialclinicoController;
use App\Http\Controllers\medicoController;
use App\Http\Controllers\pacienteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\roleController;
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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('roles', roleController::class)->names('roles');
Route::resource('users', UserController::class)->names('users');
Route::resource('medicos', medicoController::class)->names('medicos');
Route::resource('pacientes', pacienteController::class)->names('pacientes');
Route::resource('citas', citaController::class)->names('citas');
Route::resource('historias', historialclinicoController::class)->names('historias');
Route::resource('Bitacora', BitacoraController::class)->names('Bitacora');

//Choferes
Route::get('choferes/index', [App\Http\Controllers\ChoferController::class, 'index'])->name('choferes.index');
Route::get('choferes/create', [App\Http\Controllers\ChoferController::class, 'create'])->name('choferes.create');
Route::post('choferes/store', [App\Http\Controllers\ChoferController::class, 'store'])->name('choferes.store');
Route::get('choferes/edit/{id}', [App\Http\Controllers\ChoferController::class, 'edit'])->name('choferes.edit');
Route::put('choferes/update/{id}', [App\Http\Controllers\ChoferController::class, 'update'])->name('choferes.update');
Route::delete('choferes/{id}', [App\Http\Controllers\ChoferController::class, 'destroy'])->name('choferes.destroy');
/* Route::get('choferes/show/{id}', [App\Http\Controllers\ChoferController::class, 'show'])->name('choferes.show'); */
