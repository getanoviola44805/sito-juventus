<?php

namespace App\Http\Controllers;

use App\Models\Giocatore;
use Illuminate\Http\Request;

class PreferitiController extends Controller
{
    // Pagina "I miei preferiti": la lista viene caricata dopo, con fetch
    public function index()
    {
        return view('preferiti');
    }

    // GET /api/preferiti -> JSON con i giocatori preferiti dell'utente loggato
    public function elenco(Request $request)
    {
        $giocatori = $request->user()
            ->preferiti()
            ->orderBy('numero_maglia')
            ->get();

        $risultato = $giocatori->map(function ($giocatore) {
            return [
                'id' => $giocatore->id,
                'nome' => $giocatore->nome,
                'cognome' => $giocatore->cognome,
                'ruolo' => $giocatore->ruolo,
                'nazionalita' => $giocatore->nazionalita,
                'numero' => $giocatore->numero_maglia,
            ];
        });

        return response()->json($risultato);
    }

    // POST /api/preferiti/{giocatore} -> aggiunge o toglie il giocatore dai preferiti
    public function cambia(Request $request, Giocatore $giocatore)
    {
        $esito = $request->user()->preferiti()->toggle($giocatore->id);

        $aggiunto = count($esito['attached']) > 0;

        return response()->json(['preferito' => $aggiunto]);
    }
}
