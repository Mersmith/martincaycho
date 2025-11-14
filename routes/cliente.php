<?php

use App\Http\Controllers\Cliente\InicioController;


use Illuminate\Support\Facades\Route;


Route::get('/perfil', [InicioController::class, 'index'])->name('home');
