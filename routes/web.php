<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EncomendaController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\SugestaoController;
use App\Http\Controllers\PersonalizadoController;
use App\Http\Controllers\EstoqueController;
Route::get('/', function () {
});

//pesquisa/buscar



//ENCOMENDA
Route::post('/encomenda/search', [EncomendaController::class,"search"])->name('encomenda.search');
Route::get('/encomenda/chart',[EncomendaController::class, "chart"])-> name ("encomenda.chart");
Route::get('/encomenda/report/',[EncomendaController::class, "report"])->name('encomenda.report');
Route::resource('encomenda', EncomendaController::class);


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

//PERSONALIZADO

Route::post('/personalizado/search', [PersonalizadoController::class,"search"])->name('personalizado.search');
Route::resource('personalizado', PersonalizadoController::class);

//ESTOQUE
Route::post('/estoque/search', [EstoqueController::class,"search"])->name('estoque.search');
Route::get('/estoque/report/',[EstoqueController::class, "report"])->name('estoque.report');
Route::resource('estoque', EstoqueController::class);
