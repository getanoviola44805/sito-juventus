<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GiocatoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/giocatori', [GiocatoreController::class, 'index'])->name('giocatori.index');
Route::get('/giocatori/{giocatore}', [GiocatoreController::class, 'show'])->name('giocatori.show');