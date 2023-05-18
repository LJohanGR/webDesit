<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendedoreController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\registrar;
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
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/index', function(){
    return view('index');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/vendedores', [VendedoreController::class,'index'])->name('vendedores');
Route::get('/clientes', [ClientesController::class,'index'])->name('clientes');
Route::get('/ventas', [VentaController::class,'index'])->name('ventas');
Route::get('/comisiones', [VentaController::class,'comisiones'])->name('comisiones');

Route::get('/registrar-vendedor',[registrar::class,'registrarVendedor'])->name('registrar-vendedor');
Route::post('/registrar-vendedor', [registrar::class,'store']);
Route::delete('/vendedores', [VendedoreController::class,'destroy']);
Route::post('/vendedores', [VendedoreController::class,'edit']);
Route::post('/editar-vendedor', [VendedoreController::class,'edit'])->name('editar-vendedor');
Route::put('/editar-vendedor', [VendedoreController::class,'update']);



Route::get('/registrar-cliente',[registrar::class,'registrarCliente'])->name('registrar-cliente');
Route::post('/registrar-cliente', [registrar::class,'storeCliente']);
Route::delete('/clientes', [ClientesController::class,'destroy']);
Route::post('/clientes', [ClientesController::class,'edit']);
Route::post('/editar-cliente', [ClientesController::class,'edit'])->name('editar-cliente');
Route::put('/editar-cliente', [ClientesController::class,'update']);

/* Route::get('/registrar-venta', function(){
    return view('forms.venta');
})->name('registrar-venta'); */
Route::get('/registrar-venta',[VentaController::class,'idList']);
Route::post('/registrar-venta', [VentaController::class,'store'])->name('registrar-venta');
Route::post('miJQueryAjax',[VentaController::class,'idList2'])->name('ajax');