<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            GiocatoreSeeder::class,
            PartitaSeeder::class,
            NewsSeeder::class,
        ]);
    }
}