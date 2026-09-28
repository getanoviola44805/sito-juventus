@extends('layouts.app')

@section('titolo', 'Registrazione')
@section('intestazione', 'Registrati')

@section('contenuto')

    <section class="sezione form-box">
        <h2>Crea un account</h2>

        <form id="formRegistrazione" action="{{ route('registrazione') }}" method="POST" novalidate>
            @csrf

            <ul class="errori-js"></ul>

            <div class="campo">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                    <span class="errore">{{ $message }}</span>
                @enderror
            </div>

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

            <div class="campo">
                <label for="password_confirmation">Conferma password</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
            </div>

            <button type="submit" class="bottone">Registrati</button>
        </form>

        <p class="form-link">Hai già un account? <a href="{{ route('login') }}">Accedi</a></p>
    </section>

@endsection