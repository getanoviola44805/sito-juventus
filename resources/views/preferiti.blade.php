@extends('layouts.app')

@section('titolo', 'Preferiti')
@section('intestazione', 'I miei preferiti')

@section('contenuto')

    <section class="sezione">
        <h2>Giocatori preferiti</h2>

        <div class="griglia" id="listaPreferiti">
            <p class="caricamento">Caricamento dei preferiti…</p>
        </div>

        <p class="fonte">Clicca sulla stella per togliere un giocatore. Per aggiungerne altri vai alla <a href="{{ route('giocatori.index') }}">Rosa</a>.</p>
    </section>

@endsection
