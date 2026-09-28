@extends('layouts.app')

@section('titolo', 'Accedi')
@section('intestazione', 'Accedi')

@section('contenuto')

    <section class="sezione form-box">
        <h2>Accedi al sito</h2>

        <form id="formLogin" action="{{ route('login') }}" method="POST" novalidate>
            @csrf

            <ul class="errori-js"></ul>

            <div class="campo">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <span class="errore">{{ $message }}</span>
                @enderror
            </div>

            <div class="campo">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                @error('password')
                    <span class="errore">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bottone">Accedi</button>
        </form>

        <p class="form-link">Non hai un account? <a href="{{ route('registrazione') }}">Registrati</a></p>
    </section>

@endsection