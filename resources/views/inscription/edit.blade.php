@extends('layouts.app')

@section('content')
<div class="flex flex-col min-h-screen justify-between">
    <div class="container mx-auto max-w-md mt-12 pt-16">
        <h1 class="text-2xl font-bold text-center mb-6">Modifier votre inscription</h1>

        {{-- Affichage des messages d'erreur --}}
        @if (session('error'))
            <div class="text-red-500 mb-4">{{ session('error') }}</div>
        @endif

        <form id="inscriptionForm" method="POST" action="{{ route('inscription.update', $inscription->id) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="nom_maillot" class="block text-gray-700 font-medium">Nom sur le maillot</label>
                <input 
                    type="text" 
                    id="nom_maillot" 
                    name="nom_maillot" 
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300" 
                    value="{{ old('nom_maillot', $inscription->nom_maillot) }}" 
                    required 
                />
            </div>

            <div>
                <label for="dossard" class="block text-gray-700 font-medium">Dossard</label>
                <input 
                    type="number" 
                    id="dossard" 
                    name="dossard" 
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300" 
                    value="{{ old('dossard', $inscription->dossard) }}" 
                    required 
                />
                @error('dossard')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="taille_maillot" class="block text-gray-700 font-medium">Taille du maillot</label>
                <select 
                    id="taille_maillot" 
                    name="taille_maillot" 
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                >
                    @foreach(['S', 'M', 'L', 'XL', 'XXL', 'XXXL'] as $size)
                        <option value="{{ $size }}" {{ old('taille_maillot', $inscription->taille_maillot) === $size ? 'selected' : '' }}>
                            {{ $size }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button 
                type="submit" 
                class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300"
            >
                Mettre à jour
            </button>
        </form>
    </div>

    {{-- Footer fixe en bas --}}
    <footer class="bg-gray-800 text-white text-center py-3 mt-4">
        <p class="text-sm">&copy; {{ date('Y') }} Lycée Bilingue d'Émana. Tous droits réservés.</p>
    </footer>
</div>

{{-- Modale pour afficher les informations mises à jour --}}
<div id="success-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
    <div class="bg-white rounded-lg p-6 max-w-sm w-full">
        <h3 class="text-lg font-bold text-center text-green-500" id="modalMessage">Vos informations ont été mises à jour avec succès.</h3>
        <p class="text-center mt-4">Détails de votre inscription :</p>
        <ul class="mt-4">
            <li><strong>Nom sur le maillot:</strong> <span id="nom_maillot_display"></span></li>
            <li><strong>Dossard:</strong> <span id="dossard_display"></span></li>
            <li><strong>Taille du maillot:</strong> <span id="taille_maillot_display"></span></li>
        </ul>
        
        {{-- Bouton WhatsApp --}}
        <div class="text-center mt-4">
            <a id="whatsapp-link" href="#" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600" target="_blank">
                Contacter sur WhatsApp
            </a>
        </div>

        <div class="text-center mt-4">
            <button id="close-modal" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Fermer</button>
        </div>
    </div>
</div>

<script>
// Écouteur d'événements pour le formulaire
document.getElementById('inscriptionForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // Récupérer les données du formulaire
    let formData = new FormData(this);

    // Envoyer la requête AJAX pour la mise à jour
    fetch('{{ route('inscription.update', $inscription->id) }}', {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Remplir la modale avec les nouvelles données
            document.getElementById('modalMessage').innerText = data.message;
            document.getElementById('nom_maillot_display').innerText = data.data.nom_maillot;
            document.getElementById('dossard_display').innerText = data.data.dossard;
            document.getElementById('taille_maillot_display').innerText = data.data.taille_maillot;

            // Créer le lien WhatsApp avec le message pré-rempli
            let message = `Voici mes informations mises à jour pour l'inscription :\n\n`;
            message += `Nom sur le maillot : ${data.data.nom_maillot}\n`;
            message += `Dossard : ${data.data.dossard}\n`;
            message += `Taille du maillot : ${data.data.taille_maillot}\n`;
            message += `\nMerci !`;

            let whatsappLink = `https://wa.me/655818416?text=${encodeURIComponent(message)}`;
            document.getElementById('whatsapp-link').href = whatsappLink;

            // Afficher la modale
            document.getElementById('success-modal').classList.remove('hidden');
        }
    })
    .catch(error => console.error('Erreur:', error));
});

// Fermer la modale lorsque le bouton "Fermer" est cliqué
document.getElementById('close-modal').addEventListener('click', function() {
    document.getElementById('success-modal').classList.add('hidden');
});
</script>
