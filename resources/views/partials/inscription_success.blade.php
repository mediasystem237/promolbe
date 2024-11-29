<div class="alert alert-success">
    <h2>Inscription réussie !</h2>
    <p>Votre inscription a été enregistrée avec succès.</p>
    <ul>
        <li><strong>Nom :</strong> {{ $data->nom }}</li>
        <li><strong>Nom sur le maillot :</strong> {{ $data->nom_maillot }}</li>
        <li><strong>Poste :</strong> {{ $data->poste }}</li>
        <li><strong>Dossard :</strong> {{ $data->dossard }}</li>
        <li><strong>Taille du maillot :</strong> {{ $data->taille_maillot }}</li>
        <li><strong>Téléphone :</strong> {{ $data->telephone }}</li>
    </ul>
    <button id="close-modal-success" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg">
        Fermer
    </button>
</div>
