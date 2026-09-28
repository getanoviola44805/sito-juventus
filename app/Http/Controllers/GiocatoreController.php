<?php

namespace App\Http\Controllers;

use App\Models\Giocatore;
use Illuminate\Support\Facades\Auth;

class GiocatoreController extends Controller
{
    public function index()
    {
        $giocatori = Giocatore::orderBy('numero_maglia')->get();

        // id dei giocatori preferiti dell'utente loggato (vuoto se è un ospite)
        $preferiti = Auth::check()
            ? Auth::user()->preferiti()->pluck('giocatori.id')->all()
            : [];

        return view('giocatori.index', [
            'giocatori' => $giocatori,
            'preferiti' => $preferiti,
        ]);
    }

    public function show(Giocatore $giocatore)
    {
        return view('giocatori.show', ['giocatore' => $giocatore]);
    }
}
