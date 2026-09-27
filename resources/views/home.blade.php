@extends('layouts.app')

@section('titolo', 'Home')
@section('intestazione', 'Fino alla fine')

@section('contenuto')

    <section class="sezione">
        <h2>Prossime partite</h2>
        <div class="griglia">
            @forelse ($prossimePartite as $partita)
                <article class="card">
                    <p class="card-etichetta">{{ $partita->competizione }}</p>
                    <h3>{{ $partita->in_casa ? 'Juventus' : $partita->avversario }} &ndash; {{ $partita->in_casa ? $partita->avversario : 'Juventus' }}</h3>
                    <p class="card-data">{{ $partita->data->format('d/m/Y H:i') }}</p>
                    <p class="card-luogo">{{ $partita->in_casa ? 'In casa' : 'In trasferta' }}</p>
                </article>
            @empty
                <p>Nessuna partita in programma.</p>
            @endforelse
        </div>
    </section>

    <section class="sezione">
        <h2>Ultime notizie</h2>
        <div class="griglia">
            @foreach ($ultimeNews as $news)
                <article class="card">
                    <h3>{{ $news->titolo }}</h3>
                    <p class="card-data">{{ $news->created_at->format('d/m/Y') }}</p>
                    <p>{{ $news->testo }}</p>
                </article>
            @endforeach
        </div>
    </section>

@endsection