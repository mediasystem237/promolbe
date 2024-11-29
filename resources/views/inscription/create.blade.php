@extends('layouts.app')

@section('title', 'Inscription au match')

@section('content')

 <!-- Inclure la Hero Section -->
 @include('partials.hero')
 
<main class="flex-grow container mx-auto max-w-4xl px-4 py-10 mt-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Formulaire -->
        <section class="form-container bg-white rounded-lg shadow-lg p-8">
            <div class="text-center mb-6">
                <img src="{{ asset('images/logo.png') }}" alt="Logo de l'événement" class="mx-auto w-20 h-20">
                <h2 class="text-2xl font-bold text-primary">Formulaire d'inscription</h2>
            </div>
            <form id="form-inscription" method="POST" action="{{ route('match-inscription.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="nom" class="block text-gray-700 font-medium">Nom <span class="text-red-500">*</span></label>
                    <input type="text" id="nom" name="nom" placeholder="Entrez votre nom" value="{{ old('nom') }}" required
                        class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary">
                    @error('nom')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="nom_maillot" class="block text-gray-700 font-medium">Nom sur le maillot <span class="text-red-500">*</span></label>
                    <input type="text" id="nom_maillot" name="nom_maillot" placeholder="Ex : Massayo" value="{{ old('nom_maillot') }}" required
                        class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary">
                    @error('nom_maillot')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="poste" class="block text-gray-700 font-medium">Poste <span class="text-red-500">*</span></label>
                    <select id="poste" name="poste" required
                        class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary">
                        <option value="" disabled selected>Choisissez un poste</option>
                        <option value="Gardien" {{ old('poste') == 'Gardien' ? 'selected' : '' }}>Gardien</option>
                        <option value="Défenseur" {{ old('poste') == 'Défenseur' ? 'selected' : '' }}>Défenseur</option>
                        <option value="Milieu" {{ old('poste') == 'Milieu' ? 'selected' : '' }}>Milieu</option>
                        <option value="Attaquant" {{ old('poste') == 'Attaquant' ? 'selected' : '' }}>Attaquant</option>
                    </select>
                    @error('poste')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="dossard" class="block text-gray-700 font-medium">Dossard <span class="text-red-500">*</span></label>
                    <input type="number" id="dossard" name="dossard" placeholder="Numéro de dossard" value="{{ old('dossard') }}" required
                        class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary">
                    @error('dossard')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="taille_maillot" class="block text-gray-700 font-medium">Taille du maillot <span class="text-red-500">*</span></label>
                    <select id="taille_maillot" name="taille_maillot" required
                        class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary">
                        <option value="" disabled selected>Choisissez une taille</option>
                        <option value="M" {{ old('taille_maillot') == 'M' ? 'selected' : '' }}>M</option>
                        <option value="L" {{ old('taille_maillot') == 'L' ? 'selected' : '' }}>L</option>
                        <option value="XL" {{ old('taille_maillot') == 'XL' ? 'selected' : '' }}>XL</option>
                        <option value="XXL" {{ old('taille_maillot') == 'XXL' ? 'selected' : '' }}>XXL</option>
                        <option value="XXXL" {{ old('taille_maillot') == 'XXXL' ? 'selected' : '' }}>XXXL</option>
                    </select>
                    @error('taille_maillot')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="telephone" class="block text-gray-700 font-medium">Numéro de téléphone <span class="text-red-500">*</span></label>
                    <input type="tel" id="telephone" name="telephone" placeholder="Ex : 690123456" pattern="^6[0-9]{8}$" title="Le numéro doit commencer par 6 et contenir 9 chiffres." value="{{ old('telephone') }}" required
                        class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary">
                    @error('telephone')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit"
                    class="bg-primary hover:bg-secondary text-white font-medium py-2 px-4 rounded-lg w-full transition duration-300">
                    S'inscrire
                </button>
            </form>
        </section>

        <!-- Informations -->
        <section class="bg-white rounded-lg shadow-lg p-8 flex flex-col justify-between">
            <div class="text-center">
                <h3 class="text-xl font-bold text-primary mb-2">Compte à rebours</h3>
                <p id="match-date" class="text-gray-700 mb-4">21 Décembre 2024</p>
                <div id="countdown" class="text-2xl font-bold text-primary">
                    <span id="days">0</span> jours, 
                    <span id="hours">0</span> heures, 
                    <span id="minutes">0</span> minutes, 
                    <span id="seconds">0</span> secondes
                </div>
            </div>
            <div class="text-center mt-8">
                <h3 class="text-xl font-bold text-primary mb-4">Aperçu du maillot</h3>
                <img src="{{ asset('images/jersey.jpg') }}" alt="Mockup du maillot" class="rounded-lg shadow-md">
            </div>
        </section>
    </div>
</main>

 <!-- Inclusion de la partial pour la modale -->
 @include('partials.modal')

    <script src="{{ asset('js/inscription.js') }}"></script>

@endsection
