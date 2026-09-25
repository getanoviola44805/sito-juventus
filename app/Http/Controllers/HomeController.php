<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Partita;

class HomeController extends Controller
{
    public function index()
    {
        $ultimeNews = News::latest()->take(3)->get();
        $prossimePartite = Partita::whereNull('gol_fatti')->orderBy('data')->take(3)->get();

        return view('home', [
            'ultimeNews' => $ultimeNews,
            'prossimePartite' => $prossimePartite,
        ]);
    }
}