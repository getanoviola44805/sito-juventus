<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassificaController;
use App\Http\Controllers\GiocatoreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PreferitiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/giocatori', [GiocatoreController::class, 'index'])->name('giocatori.index');
Route::get('/giocatori/{giocatore}', [GiocatoreController::class, 'show'])->name('giocatori.show');

Route::get('/classifica', [ClassificaController::class, 'index'])->name('classifica');
Route::get('/api/classifica', [ClassificaController::class, 'classifica'])->name('api.classifica');
Route::get('/api/meteo', [ClassificaController::class, 'meteo'])->name('api.meteo');

Route::get('/registrazione', [AuthController::class, 'mostraRegistrazione'])->name('registrazione')->middleware('guest');
Route::post('/registrazione', [AuthController::class, 'registra'])->middleware('guest');
Route::get('/login', [AuthController::class, 'mostraLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/preferiti', [PreferitiController::class, 'index'])->name('preferiti')->middleware('auth');
Route::get('/api/preferiti', [PreferitiController::class, 'elenco'])->name('api.preferiti')->middleware('auth');
Route::post('/api/preferiti/{giocatore}', [PreferitiController::class, 'cambia'])->name('api.preferiti.cambia')->middleware('auth');
