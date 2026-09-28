<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ClassificaController extends Controller
{
    // La pagina: HTML vuoto, i dati li carica JavaScript
    public function index()
    {
        return view('classifica');
    }

    // API 1, con autenticazione: classifica della Serie A da football-data.org
    public function classifica()
    {
        try {
            $squadre = Cache::remember('classifica_serie_a', 600, function () {
                $risposta = Http::withHeaders([
                    'X-Auth-Token' => config('services.football_data.key'),
                ])->timeout(10)
                  ->get('https://api.football-data.org/v4/competitions/SA/standings')
                  ->throw();

                $righe = $risposta->json('standings.0.table') ?? [];

                return array_map(function ($riga) {
                    return [
                        'posizione' => $riga['position'],
                        'squadra' => $riga['team']['shortName'],
                        'stemma' => $riga['team']['crest'],
                        'giocate' => $riga['playedGames'],
                        'vinte' => $riga['won'],
                        'pareggiate' => $riga['draw'],
                        'perse' => $riga['lost'],
                        'differenza' => $riga['goalDifference'],
                        'punti' => $riga['points'],
                    ];
                }, $righe);
            });
        } catch (\Throwable $e) {
            return response()->json(['errore' => 'Classifica non disponibile.'], 503);
        }

        return response()->json($squadre);
    }

    // API 2, senza autenticazione: meteo allo Stadium da Open-Meteo
    public function meteo()
    {
        try {
            $risposta = Http::timeout(10)->get('https://api.open-meteo.com/v1/forecast', [
                'latitude' => 45.1096,
                'longitude' => 7.6413,
                'current' => 'temperature_2m,wind_speed_10m,weather_code',
                'timezone' => 'Europe/Rome',
            ])->throw();
        } catch (\Throwable $e) {
            return response()->json(['errore' => 'Meteo non disponibile.'], 503);
        }

        return response()->json([
            'temperatura' => $risposta->json('current.temperature_2m'),
            'vento' => $risposta->json('current.wind_speed_10m'),
            'codice' => $risposta->json('current.weather_code'),
        ]);
    }
}