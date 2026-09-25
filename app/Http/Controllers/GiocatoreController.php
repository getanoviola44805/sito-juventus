<?php

namespace App\Http\Controllers;

use App\Models\Giocatore;

class GiocatoreController extends Controller
{
    public function index()
    {
        $giocatori = Giocatore::orderBy('numero_maglia')->get();

        return view('giocatori.index', ['giocatori' => $giocatori]);
    }

    public function show(Giocatore $giocatore)
    {
        return view('giocatori.show', ['giocatore' => $giocatore]);
    }
}