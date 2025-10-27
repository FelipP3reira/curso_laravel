<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarrinhoController;

route::resource('home', ProdutoController::class);

Route::get('/', [SiteController::class,'index'])->name('site.index');

Route::get('/produto/{slug}', [SiteController::class, 'details'])->name('site.details');
Route::get('categoria/{id}', [SiteController::class, 'categoria'])->name('site.categoria');

Route::get('/carrinho', [CarrinhoController::class, 'carrinhoLista'])->name('site.carrinho');
Route::post('/carrinho/adicionar',[CarrinhoController::class,'adicionaCarrinho'])->name('site.addcarrinho');
Route::delete('/carrinho/remover',[CarrinhoController::class,'removeCarrinho'])->name('site.removecarrinho');
Route::post('/carrinho/atualizar',[CarrinhoController::class,'atualizaCarrinho'])->name('site.atualizacarrinho');
Route::get('/carrinho/limpar',[CarrinhoController::class,'limparCarrinho'])->name('site.limparcarrinho');
