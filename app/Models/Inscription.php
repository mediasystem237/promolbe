<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'dossard', 
        'nom', 
        'nom_maillot', 
        'poste', 
        'taille_maillot', 
        'telephone',
        'paiement_maillot' // Nouveau champ
    ];
    
    
}
