<?php

namespace App\Exports;

use App\Models\Inscription;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InscriptionsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Récupère toutes les inscriptions.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Inscription::all();
    }

    /**
     * Définir les entêtes de colonnes de l'export.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Nom',
            'Nom sur le Maillot',
            'Poste',
            'Dossard',
            'Taille',
            'Téléphone'
        ];
    }

    /**
     * Mapper les données de l'inscription.
     * Ici, on assure que chaque colonne correspond à la bonne donnée.
     *
     * @param mixed $inscription
     * @return array
     */
    public function map($inscription): array
{
    $telephone = $inscription->telephone;

    // Vérifier si le téléphone est local ou international et formater en conséquence
    if (substr($telephone, 0, 3) === '237') {  // Si le numéro commence par l'indicatif Cameroun
        // Format international
        $formattedTelephone = '+237 ' . substr($telephone, 3, 2) . ' ' . substr($telephone, 5, 2) . ' ' . substr($telephone, 7, 2) . ' ' . substr($telephone, 9);
    } else {
        // Format local
        $formattedTelephone = preg_replace('/(\d{2})(?=\d)/', '$1 ', $telephone);
    }

    return [
        $inscription->nom,
        $inscription->nom_maillot,
        $inscription->poste,
        $inscription->dossard,
        $inscription->taille_maillot,
        $formattedTelephone, // Numéro de téléphone formaté
    ];
}

}
