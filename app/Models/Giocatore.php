<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giocatore extends Model
{
    use HasFactory;

    protected $table = 'giocatori';

    protected $fillable = [
        'nome',
        'cognome',
        'ruolo',
        'numero_maglia',
        'nazionalita',
        'data_nascita',
        'foto',
    ];

    // Gli utenti che hanno messo questo giocatore tra i preferiti
    public function tifosi()
    {
        return $this->belongsToMany(User::class, 'giocatore_user');
    }
}