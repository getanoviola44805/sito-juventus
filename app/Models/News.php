<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'titolo',
        'testo',
        'immagine',
        'user_id',
    ];

    // L'autore della news
    public function autore()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}