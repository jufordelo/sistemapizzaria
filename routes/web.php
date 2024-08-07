<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\SugestaoController;

Route::get('/', function () {
});

//pesquisa/buscar


//P
Route::post('/pedido/search', [PedidoController::class,"search"])->name('pedido.search');
Route::get('/pedido/chart',[PedidoController::class, "chart"])-> name ("pedido.chart");
Route::get('/pedido/report/',[ PedidoController::class, "report"])->name('pedido.report');
Route::resource('pedido', PedidoController::class);

//RESERVA

Route::post('/reserva/search', [ReservaController::class,"search"])->name('reserva.search');
Route::get('/reserva/chart',[ReservaController::class, "chart"])-> name ("reserva.chart");
Route::get('/reserva/report/',[ReservaController::class, "report"])->name('reserva.report');
Route::resource('reserva', ReservaController::class);

Route::resource('categoria_reserva', CategoriaReservaController::class);
Route::post('/categoria_reserva/search', [CategoriaReservaController::class,"search"])->name('categoria_reserva.search');

//SUGESTAO
Route::resource('sugestao', SugestaoController::class);
Route::post('/sugestao/search', [SugestaoController::class,"search"])->name('sugestao.search');
