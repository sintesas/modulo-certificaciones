<?php

use App\Http\Controllers\CargoController;
use App\Http\Controllers\LaboralController;
use App\Http\Controllers\TiempoController;
use App\Http\Controllers\PagoController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertificadosController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SearchController;

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
    return view('auth.login');
});


Route::get('/validate', function () {
    return view('auth.validate');
});
Route::post('/email', [MailController::class, 'register'])->name('email');


Route::get('/certificados', [CertificadosController::class, 'certificados'])->name('certificados');



Route::post('/download', [CertificadosController::class, 'download'])->name('download');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/admin', function () {
    return view('index');
})->middleware('role');

Route::post('/download', [CertificadosController::class, 'download'])->name('download');

Route::get('/Admin/usuarios/list', [CargoController::class, 'listuser'])->name('Llistuser');
Route::get('/admin/usuarios/delete/{id}', [CargoController::class, 'udelete'])->name('Udelete');
Route::get('/Admin/usuarios/buscar', [CargoController::class, 'buscaru'])->name('buscaru');
Route::get('/Admin/usuarios/editar/{id}', [CargoController::class, 'uedit'])->name('uedit');
Route::post('/admin/usuarios/update/{id}', [CargoController::class, 'updateu'])->name('updateu');
//*************************Cargo***********************||
Route::get('/Admin/Cargo/listar', [CargoController::class, 'list'])->name('Clist');
Route::get('/Admin/Cargo/crear', [CargoController::class, 'create'])->name('Ccreate');
Route::post('/admin/Cargo/create', [CargoController::class, 'save'])->name('Csave');
Route::get('/admin/Cargo/delete/{id}', [CargoController::class, 'delete'])->name('Cdelete');
Route::get('/Admin/Cargo/editar/{id}', [CargoController::class, 'edit'])->name('Cdelete');
Route::post('/admin/Cargo/update/{id}', [CargoController::class, 'update'])->name('Cdelete');

//*************************Laboral***********************||
Route::get('/Admin/Laboral/listar', [LaboralController::class, 'list'])->name('Llist');
Route::get('/Admin/Laboral/crear', [LaboralController::class, 'create'])->name('Lcreate');
Route::post('/admin/Laboral/create', [LaboralController::class, 'save'])->name('Lsave');
Route::get('/admin/Laboral/delete/{id}', [LaboralController::class, 'delete'])->name('Ldelete');
Route::get('/Admin/Laboral/editar/{id}', [LaboralController::class, 'edit'])->name('Ldelete');
Route::post('/admin/Laboral/update/{id}', [LaboralController::class, 'update'])->name('Ldelete');



//*************************Tiempo***********************||
Route::get('/Admin/Tiempo/listar', [TiempoController::class, 'list'])->name('Tlist');
Route::get('/Admin/Tiempo/crear', [TiempoController::class, 'create'])->name('Tcreate');
Route::post('/admin/Tiempo/create', [TiempoController::class, 'save'])->name('Tsave');
Route::get('/admin/Tiempo/delete/{id}', [TiempoController::class, 'delete'])->name('Tdelete');
Route::get('/Admin/Tiempo/editar/{id}', [TiempoController::class, 'edit'])->name('Tdelete');
Route::post('/admin/Tiempo/update/{id}', [TiempoController::class, 'update'])->name('Tdelete');


//*************************Pago***********************||
Route::get('/Admin/Pago/listar', [PagoController::class, 'list'])->name('Plist');
Route::get('/Admin/Pago/crear', [PagoController::class, 'create'])->name('Pcreate');
Route::post('/admin/Pago/create', [PagoController::class, 'save'])->name('Psave');
Route::get('/admin/Pago/delete/{id}', [PagoController::class, 'delete'])->name('Pdelete');
Route::get('/Admin/Pago/editar/{id}', [PagoController::class, 'edit'])->name('Pdelete');
Route::post('/admin/Pago/update/{id}', [PagoController::class, 'update'])->name('Pdelete');

//***************************************************
Route::post('/validate', [MailController::class, 'register']);



Route::get('/search_document/{token}', [SearchController::class, 'search_document'])->name('search_document');
Route::get('/search', function () {
    return view('auth.search');
});


Route::get('/search_meses/{ano}/{nomina}', [CertificadosController::class, 'search_meses'])->name('search_meses');

Route::get('/search_anos/{nomina}', [CertificadosController::class, 'search_anos'])->name('search_anos');
