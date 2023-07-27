<?php

use App\Http\Livewire\Tipomaterial;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ServiciosImportados;
use App\Http\Livewire\ServiciosImportadosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/tipomaterial', Tipomaterial::class)->name('tipomaterial');

Route::get('/servicios_importados', ServiciosImportados::class)->name('servicios_importados');

//Route::get('/create_servicios', ServiciosImportadosController::class)->name('create_servicios');
Route::get('/create_servicios',ServiciosImportadosController::class)->name('create_servicios');
