<?php

use App\Http\Controllers\AlbunsController;
use App\Http\Controllers\FaixasController;
use Illuminate\Support\Facades\Route;

Route::post('/albuns/criar', [AlbunsController::class, 'criarAlbum']);
Route::get('/albuns/listar', [AlbunsController::class, 'listarAlbuns']);
Route::get('/album/listar', [AlbunsController::class, 'listarAlbum']);
Route::delete('/albuns/deletar', [AlbunsController::class, 'deletarAlbum']);

Route::post('/faixas/criar', [FaixasController::class, 'criarFaixa']);
Route::get('/faixas/listar', [FaixasController::class, 'listarFaixas']);
Route::get('/faixa/listar', [FaixasController::class, 'listarFaixa']);
Route::delete('/faixas/deletar', [FaixasController::class, 'deletarFaixa']);

