<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'nom_maillot',
        'poste',
        'dossard',
        'taille_maillot',
        'telephone',
    ];
    
}
