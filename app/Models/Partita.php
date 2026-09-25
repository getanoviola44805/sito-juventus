<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partita extends Model
{
    use HasFactory;

    protected $table = 'partite';

    protected $fillable = [
        'avversario',
        'data',
        'in_casa',
        'gol_fatti',
        'gol_subiti',
        'competizione',
    ];

    protected $casts = [
        'data' => 'datetime',
        'in_casa' => 'boolean',
    ];
}