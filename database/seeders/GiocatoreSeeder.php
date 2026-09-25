<?php

namespace Database\Seeders;

use App\Models\Giocatore;
use Illuminate\Database\Seeder;

class GiocatoreSeeder extends Seeder
{
    public function run(): void
    {
        $giocatori = [
            ['nome' => 'Michele', 'cognome' => 'Di Gregorio', 'ruolo' => 'Portiere', 'numero_maglia' => 29, 'nazionalita' => 'Italia', 'data_nascita' => '1997-07-06'],
            ['nome' => 'Mattia', 'cognome' => 'Perin', 'ruolo' => 'Portiere', 'numero_maglia' => 36, 'nazionalita' => 'Italia', 'data_nascita' => '1992-11-10'],
            ['nome' => 'Federico', 'cognome' => 'Gatti', 'ruolo' => 'Difensore', 'numero_maglia' => 4, 'nazionalita' => 'Italia', 'data_nascita' => '1998-06-24'],
            ['nome' => 'Gleison', 'cognome' => 'Bremer', 'ruolo' => 'Difensore', 'numero_maglia' => 3, 'nazionalita' => 'Brasile', 'data_nascita' => '1997-03-18'],
            ['nome' => 'Andrea', 'cognome' => 'Cambiaso', 'ruolo' => 'Difensore', 'numero_maglia' => 27, 'nazionalita' => 'Italia', 'data_nascita' => '2000-02-20'],
            ['nome' => 'Pierre', 'cognome' => 'Kalulu', 'ruolo' => 'Difensore', 'numero_maglia' => 15, 'nazionalita' => 'Francia', 'data_nascita' => '2000-06-05'],
            ['nome' => 'Manuel', 'cognome' => 'Locatelli', 'ruolo' => 'Centrocampista', 'numero_maglia' => 5, 'nazionalita' => 'Italia', 'data_nascita' => '1998-01-08'],
            ['nome' => 'Khephren', 'cognome' => 'Thuram', 'ruolo' => 'Centrocampista', 'numero_maglia' => 19, 'nazionalita' => 'Francia', 'data_nascita' => '2001-03-26'],
            ['nome' => 'Weston', 'cognome' => 'McKennie', 'ruolo' => 'Centrocampista', 'numero_maglia' => 16, 'nazionalita' => 'Stati Uniti', 'data_nascita' => '1998-08-28'],
            ['nome' => 'Kenan', 'cognome' => 'Yildiz', 'ruolo' => 'Attaccante', 'numero_maglia' => 10, 'nazionalita' => 'Turchia', 'data_nascita' => '2005-05-04'],
            ['nome' => 'Dusan', 'cognome' => 'Vlahovic', 'ruolo' => 'Attaccante', 'numero_maglia' => 9, 'nazionalita' => 'Serbia', 'data_nascita' => '2000-01-28'],
            ['nome' => 'Francisco', 'cognome' => 'Conceicao', 'ruolo' => 'Attaccante', 'numero_maglia' => 7, 'nazionalita' => 'Portogallo', 'data_nascita' => '2002-12-14'],
        ];

        foreach ($giocatori as $g) {
            Giocatore::create($g);
        }
    }
}