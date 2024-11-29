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
        // Récupérer les dossards déjà pris
        $dossardsPris = Inscription::pluck('dossard')->toArray();
        

        // Passer les données à la vue
        return view('inscription.create', compact('dossardsPris'));
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

            // Mettre à jour le champ message_sent
             $inscription->update(['message_sent' => true]);



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

    public function find()
    {
        return view('inscription.find');
    }


    public function edit(Request $request)
    {
        $request->validate([
            'telephone' => 'required|digits:9', // Exemple : numéro à 9 chiffres
        ]);

        $inscription = Inscription::where('telephone', $request->telephone)->first();

        if (!$inscription) {
            return redirect()->route('inscription.find')->with('error', 'Aucune inscription trouvée pour ce numéro.');
        }

        return view('inscription.edit', compact('inscription'));
    }

    public function update(Request $request, $id)
    {
        $inscription = Inscription::findOrFail($id);

        $request->validate([
            'nom_maillot' => 'required|string|max:255',
            'dossard' => 'required|integer|unique:inscriptions,dossard,' . $id,
            'taille_maillot' => 'required|string',
            // Ajoutez d'autres règles si nécessaire
        ]);

        $inscription->update($request->only('nom_maillot', 'dossard', 'taille_maillot'));

        // Retourner les données mises à jour en JSON
    return response()->json([
        'success' => true,
        'message' => 'Vos informations ont été mises à jour avec succès.',
        'data' => $inscription
    ]);

    }

}
