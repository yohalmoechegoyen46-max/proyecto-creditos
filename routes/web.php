<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CreditoController;
Route::get('/', function () {
 return redirect()->route('clientes.index');
});
Route::resource('clientes', ClienteController::class);
Route::resource('creditos', CreditoController::class);
