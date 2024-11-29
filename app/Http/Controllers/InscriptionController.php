<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;
use App\Http\Controllers\SmsController;

class InscriptionController extends Controller
{
    /**
     * Affiche le formulaire d'inscription.
     */
    public function create()
    {
        return view('inscription.create');
    }

    /**
     * Traite les données soumises et enregistre l'inscription.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'nom_maillot' => 'required|string|max:255',
            'poste' => 'required|string',
            'dossard' => 'required|integer|unique:inscriptions',
            'taille_maillot' => 'required|string',
            'telephone' => 'required|regex:/^6[0-9]{8}$/',
        ]);

        try {
            // Enregistrer l'inscription
            $inscription = Inscription::create($validated);

            // Appeler SmsController pour envoyer un SMS à l'utilisateur
            $smsController = new SmsController();  // Instancier le SmsController
            $smsController->sendSmsToUser($request, $inscription);  // Envoyer un SMS à l'utilisateur

            // Envoyer une notification à l'administrateur
            $adminPhone = '681350008';  // Le numéro de téléphone de l'administrateur
            $smsController->sendSmsToAdmin($adminPhone, $inscription);  // Envoyer un SMS à l'administrateur

            // Retourner les données sous forme de JSON
            return response()->json([
                'success' => true,
                'message' => 'Inscription réussie !',
                'data' => $inscription,  // Les données d'inscription à afficher dans la modale
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors de l\'enregistrement.',
            ], 500);
        }
    }
}
