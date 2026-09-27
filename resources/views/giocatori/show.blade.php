@extends('layouts.app')

@section('titolo', $giocatore->cognome)
@section('intestazione', $giocatore->cognome)

@section('contenuto')

    <section class="sezione">
        <a href="{{ route('giocatori.index') }}" class="bottone">&larr; Torna alla rosa</a>

        <div class="scheda">
            <div class="scheda-numero">
                <span>{{ $giocatore->numero_maglia }}</span>
            </div>

            <div class="scheda-dati">
                <h2>{{ $giocatore->nome }} {{ $giocatore->cognome }}</h2>
                <ul class="dati">
                    <li><strong>Ruolo:</strong> {{ $giocatore->ruolo }}</li>
                    <li><strong>Nazionalità:</strong> {{ $giocatore->nazionalita ?? 'Non disponibile' }}</li>
                    <li><strong>Data di nascita:</strong>
                        @if ($giocatore->data_nascita)
                            {{ \Carbon\Carbon::parse($giocatore->data_nascita)->format('d/m/Y') }}
                        @else
                            Non disponibile
                        @endif
                    </li>
                    <li><strong>Numero di maglia:</strong> {{ $giocatore->numero_maglia ?? '—' }}</li>
                </ul>
            </div>
        </div>
    </section>

@endsection