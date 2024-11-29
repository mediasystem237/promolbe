<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EvenementController extends Controller
{
    // Affiche la page de participation à l'événement
    public function participer()
    {
        return view('evenement-participation'); // Créez une vue correspondante
    }
}
