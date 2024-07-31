<?php

use App\Http\Controllers\AlbunsController;
use App\Http\Controllers\FaixasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

