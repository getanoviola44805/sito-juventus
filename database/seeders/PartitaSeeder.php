<?php

namespace Database\Seeders;

use App\Models\Partita;
use Illuminate\Database\Seeder;

class PartitaSeeder extends Seeder
{
    public function run(): void
    {
        $partite = [
            ['avversario' => 'Inter', 'data' => '2026-09-13 20:45:00', 'in_casa' => true, 'gol_fatti' => 2, 'gol_subiti' => 1, 'competizione' => 'Serie A'],
            ['avversario' => 'Milan', 'data' => '2026-09-20 18:00:00', 'in_casa' => false, 'gol_fatti' => 1, 'gol_subiti' => 1, 'competizione' => 'Serie A'],
            ['avversario' => 'Napoli', 'data' => '2026-09-27 20:45:00', 'in_casa' => true, 'gol_fatti' => null, 'gol_subiti' => null, 'competizione' => 'Serie A'],
            ['avversario' => 'Real Madrid', 'data' => '2026-10-01 21:00:00', 'in_casa' => false, 'gol_fatti' => null, 'gol_subiti' => null, 'competizione' => 'Champions League'],
            ['avversario' => 'Roma', 'data' => '2026-10-05 15:00:00', 'in_casa' => true, 'gol_fatti' => null, 'gol_subiti' => null, 'competizione' => 'Serie A'],
        ];

        foreach ($partite as $p) {
            Partita::create($p);
        }
    }
}