<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $utente = User::create([
            'name' => 'Redazione',
            'email' => 'redazione@juventus.test',
            'password' => Hash::make('password'),
        ]);

        $news = [
            ['titolo' => 'Vittoria nel derby d\'Italia', 'testo' => 'Successo per 2-1 allo Stadium contro l\'Inter. Decisiva la doppietta nella ripresa davanti a oltre quarantamila spettatori.'],
            ['titolo' => 'Pareggio a San Siro', 'testo' => 'Finisce 1-1 contro il Milan in una gara equilibrata, con un buon secondo tempo della squadra.'],
            ['titolo' => 'Verso la Champions', 'testo' => 'La squadra prepara la trasferta europea. Rifinitura alla Continassa prima della partenza.'],
        ];

        foreach ($news as $n) {
            News::create([
                'titolo' => $n['titolo'],
                'testo' => $n['testo'],
                'user_id' => $utente->id,
            ]);
        }
    }
}