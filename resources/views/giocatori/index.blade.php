@extends('layouts.app')

@section('titolo', 'Rosa')
@section('intestazione', 'La rosa')

@section('contenuto')

    <section class="sezione">
        <h2>Giocatori</h2>

        <div class="filtri">
            <button class="filtro attivo" data-ruolo="tutti">Tutti</button>
            <button class="filtro" data-ruolo="Portiere">Portieri</button>
            <button class="filtro" data-ruolo="Difensore">Difensori</button>
            <button class="filtro" data-ruolo="Centrocampista">Centrocampisti</button>
            <button class="filtro" data-ruolo="Attaccante">Attaccanti</button>
        </div>

        <div class="griglia" id="listaGiocatori">
            @foreach ($giocatori as $giocatore)
                <article class="card card-giocatore" data-ruolo="{{ $giocatore->ruolo }}">
                    <span class="numero">{{ $giocatore->numero_maglia }}</span>
                    <h3>{{ $giocatore->nome }} {{ $giocatore->cognome }}</h3>
                    <p class="card-etichetta">{{ $giocatore->ruolo }}</p>
                    <p class="card-data">{{ $giocatore->nazionalita }}</p>
                    <a href="{{ route('giocatori.show', $giocatore) }}" class="bottone">Scheda</a>
                </article>
            @endforeach
        </div>
    </section>

@endsection