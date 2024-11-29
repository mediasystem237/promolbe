<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SmsController extends Controller
{
    // Méthode pour envoyer un SMS à l'utilisateur
    public function sendSmsToUser($request, $inscription)
    {
        $message = "Félicitations {$inscription->nom} pour votre inscription !\n";
        $message .= "Nom sur le maillot : {$inscription->nom_maillot}.\n";
        $message .= "Poste : {$inscription->poste}.\n";
        $message .= "Dossard : {$inscription->dossard}.\n";
        $message .= "Taille : {$inscription->taille_maillot}";

        $data = [
            'user' => env('NEXAH_USER'),
            'password' => env('NEXAH_PASSWORD'),
            'senderid' => env('NEXAH_SENDERID'),
            'sms' => $message,
            'mobiles' => $request->telephone, // Numéro de téléphone de l'utilisateur
        ];

        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('http://smsvas.com/bulk/public/index.php/api/v1/sendsms', $data);

            if (!$response->successful()) {
                throw new \Exception('Erreur lors de l\'envoi du message à l\'utilisateur.');
            }
        } catch (\Exception $e) {
            \Log::error("Erreur lors de l'envoi du SMS à l'utilisateur : " . $e->getMessage());
        }
    }

    // Méthode pour envoyer un SMS à l'administrateur
    public function sendSmsToAdmin($adminPhone, $inscription)
    {
        $message = "Nouvelle inscription :\n";
        $message .= "Nom : {$inscription->nom}\n";
        $message .= "Nom sur le maillot : {$inscription->nom_maillot}\n";
        $message .= "Poste : {$inscription->poste}\n";
        $message .= "Dossard : {$inscription->dossard}\n";
        $message .= "Taille du maillot : {$inscription->taille_maillot}\n";
        $message .= "Tél : {$inscription->telephone}";

        $data = [
            'user' => env('NEXAH_USER'),
            'password' => env('NEXAH_PASSWORD'),
            'senderid' => env('NEXAH_SENDERID'),
            'sms' => $message,
            'mobiles' => $adminPhone,
        ];

        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('http://smsvas.com/bulk/public/index.php/api/v1/sendsms', $data);

            if (!$response->successful()) {
                throw new \Exception('Erreur lors de l\'envoi du message à l\'administrateur.');
            }
        } catch (\Exception $e) {
            \Log::error("Erreur lors de l'envoi du SMS à l'administrateur : " . $e->getMessage());
        }
    }
}
