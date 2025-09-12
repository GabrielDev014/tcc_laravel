<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresasController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [EmpresasController::class, 'index'])->name('empresas_index');
Route::get('/inserir', [EmpresasController::class, 'exibir_inclusao'])->name('empresas_exibir_inclusao');
Route::get('/empresas/importar', [EmpresasController::class, 'importar'])->name('empresas.importar');