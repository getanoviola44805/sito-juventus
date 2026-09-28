@extends('layouts.app')

@section('titolo', 'Classifica')
@section('intestazione', 'Classifica')

@section('contenuto')

    <section class="sezione">
        <h2>Meteo allo Stadium</h2>
        <div class="meteo" id="meteo">
            <p class="caricamento">Caricamento del meteo…</p>
        </div>
    </section>

    <section class="sezione">
        <h2>Serie A</h2>
        <div class="tabella-wrap">
            <table class="classifica">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="col-squadra">Squadra</th>
                        <th>G</th>
                        <th>V</th>
                        <th>N</th>
                        <th>P</th>
                        <th>DR</th>
                        <th>Pt</th>
                    </tr>
                </thead>
                <tbody id="corpoClassifica">
                    <tr><td colspan="8" class="caricamento">Caricamento della classifica…</td></tr>
                </tbody>
            </table>
        </div>
        <p class="fonte">Dati: football-data.org e Open-Meteo</p>
    </section>

@endsection