<div id="confirmation-modal" class="fixed inset-0 hidden bg-gray-900 bg-opacity-50 flex justify-center items-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative">
        <!-- Bouton pour fermer la modale (croix) -->
        <button 
            id="close-modal-cross"
            class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 focus:outline-none"
        >
            &times;
        </button>

        <!-- Contenu pour un succès -->
        <div id="success-message" class="hidden">
            <h2 class="text-xl font-bold text-green-500">Inscription réussie !</h2>
            <p class="mt-4 text-gray-600">Votre inscription a été enregistrée avec succès. Voici les détails :</p>
            <ul class="mt-4 space-y-2 text-sm text-gray-700">
                <li><strong>Nom :</strong> <span id="recap-nom"></span></li>
                <li><strong>Nom sur le maillot :</strong> <span id="recap-nom-maillot"></span></li>
                <li><strong>Poste :</strong> <span id="recap-poste"></span></li>
                <li><strong>Dossard :</strong> <span id="recap-dossard"></span></li>
                <li><strong>Taille du maillot :</strong> <span id="recap-taille-maillot"></span></li>
                <li><strong>Téléphone :</strong> <span id="recap-telephone"></span></li>
            </ul>
            <p class="mt-4 text-sm text-gray-600">
                Vous recevrez un message sur votre numéro 
                <strong><span id="recap-telephone-message"></span></strong> avec les détails ci-dessus. <br />
                Si vous ne recevez pas de message, contactez 
                <strong>M. Freddy Narcisse Nkodo</strong> au <strong>655818416</strong> pour finaliser le paiement.
            </p>
            <button 
                id="close-modal-success"
                class="mt-6 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg w-full"
            >
                Fermer
            </button>
        </div>

        <!-- Contenu pour une erreur -->
        <div id="error-message" class="hidden">
            <h2 class="text-xl font-bold text-red-500">Erreur lors de l'inscription</h2>
            <p class="mt-4 text-sm text-gray-600">
                Une erreur s'est produite : <span id="error-detail"></span>
            </p>
            <button 
                id="close-modal-error"
                class="mt-6 bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg w-full"
            >
                Revenir au formulaire
            </button>
        </div>
    </div>
</div>

<script>
// Écouter la soumission du formulaire d'inscription
document.getElementById('form-inscription').addEventListener('submit', function (event) {
    event.preventDefault();  // Empêcher la soumission par défaut

    // Récupérer les données du formulaire
    let formData = new FormData(this);

    // Envoyer les données via AJAX
    fetch('/inscription', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Remplir les détails dans la modale
            document.getElementById('recap-nom').textContent = data.data.nom;
            document.getElementById('recap-nom-maillot').textContent = data.data.nom_maillot;
            document.getElementById('recap-poste').textContent = data.data.poste;
            document.getElementById('recap-dossard').textContent = data.data.dossard;
            document.getElementById('recap-taille-maillot').textContent = data.data.taille_maillot;
            document.getElementById('recap-telephone').textContent = data.data.telephone;
            document.getElementById('recap-telephone-message').textContent = data.data.telephone;

            // Afficher la section de succès
            document.getElementById('success-message').classList.remove('hidden');
            document.getElementById('error-message').classList.add('hidden');

            // Afficher la modale
            document.getElementById('confirmation-modal').classList.remove('hidden');

            // Réinitialiser les champs du formulaire
            document.getElementById('form-inscription').reset();

        } else {
            // Si l'inscription échoue, afficher un message d'erreur
            document.getElementById('error-detail').textContent = data.message;
            document.getElementById('success-message').classList.add('hidden');
            document.getElementById('error-message').classList.remove('hidden');
            
            // Afficher la modale
            document.getElementById('confirmation-modal').classList.remove('hidden');
        }
    })
    .catch(error => {
        console.error('Erreur:', error);
        alert('Une erreur est survenue.');
    });
});

// Fermer la modale lorsque l'utilisateur clique sur la croix
document.getElementById('close-modal-cross').addEventListener('click', function () {
    document.getElementById('confirmation-modal').classList.add('hidden');
});

// Fermer la modale après la réussite
document.getElementById('close-modal-success').addEventListener('click', function () {
    document.getElementById('confirmation-modal').classList.add('hidden');
});

// Fermer la modale après une erreur
document.getElementById('close-modal-error').addEventListener('click', function () {
    document.getElementById('confirmation-modal').classList.add('hidden');
});


</script>