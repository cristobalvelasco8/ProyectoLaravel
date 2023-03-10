<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
})->name('veterinario')->middleware(['auth','verified']);

Route::get('/registrarAnimal', function () {
    return view('registroAnimal');
})->name('registrarAnimal')->middleware(['auth','verified']);

Route::get('/veterinarios', function () {
    return view('veterinarios');
})->name('veterinarios')->middleware(['auth','verified','administrador']);

Route::get('/registrarVeterinarios', function () {
    return view('registrarVeterinarios');
})->name('registrarVeterinarios')->middleware(['auth','verified','administrador']);

Route::get('/historial', function () {
    return view('historialVacunas');
})->name('historial')->middleware(['auth','verified']);

Route::get('/factura/{id}', [AnimalController::class,'show'])->name('factura');

//Rutas al controlador de recursos de cada entidad
Route::resource('animal', AnimalController::class)->middleware(['auth','verified']);
Route::resource('client', ClientController::class)->middleware(['auth','verified']);
Route::resource('user', UserController::class)->middleware(['auth','verified']);


require __DIR__.'/auth.php';
