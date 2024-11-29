<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Méthode pour afficher le formulaire de code d'accès
    public function showAccessForm()
    {
        return view('access-code');
    }

    // Méthode pour vérifier le code d'accès
    public function checkAccessCode(Request $request)
    {
        // Le code d'accès correct (par exemple 123456)
        $correctCode = '123456';

        // Vérifier si le code d'accès saisi est correct
        if ($request->input('access_code') === $correctCode) {
            // Si le code est correct, mettre à jour la session pour autoriser l'accès
            session(['access_granted' => true]);

            // Rediriger vers le dashboard
            return redirect()->route('dashboard');
        }

        // Si le code est incorrect, afficher un message d'erreur
        return redirect()->route('dashboard.access')->with('error', 'Code d\'accès incorrect.');
    }

    public function index(Request $request)
{
    // Vérifier si l'accès est autorisé
    if (!session('access_granted')) {
        // Si l'accès n'est pas autorisé, rediriger vers la page de code d'accès
        return redirect()->route('dashboard.access');
    }

    // Créer la requête de base
    $query = Inscription::query();

    // Recherche
    if ($request->has('search')) {
        $search = $request->get('search');
        $query->where('nom', 'like', "%{$search}%")
              ->orWhere('nom_maillot', 'like', "%{$search}%")
              ->orWhere('dossard', 'like', "%{$search}%");
    }

    // Récupérer les inscriptions depuis la base de données avec pagination
    $inscriptions = $query->get();  // Utiliser paginate(10) pour la pagination

    // Retourner la vue avec les inscriptions
    return view('dashboard', compact('inscriptions'));
}
}
