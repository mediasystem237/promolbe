@extends('layouts.admin')

@section('title', 'Dashboard des inscriptions')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- En-tête du dashboard -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-primary mb-2">Dashboard des inscriptions</h1>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Carte statistique 1 -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-gray-500 text-sm">Total inscrits</h3>
                <p class="text-2xl font-bold">{{ $inscriptions->count() }}</p>
            </div>
            <!-- Carte statistique 2 -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-gray-500 text-sm">Gardiens</h3>
                <p class="text-2xl font-bold">{{ $inscriptions->where('poste', 'Gardien')->count() }}</p>
            </div>
            <!-- Carte statistique 3 -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-gray-500 text-sm">Défenseurs</h3>
                <p class="text-2xl font-bold">{{ $inscriptions->where('poste', 'Défenseur')->count() }}</p>
            </div>
            <!-- Carte statistique 3 -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-gray-500 text-sm">Milieux</h3>
                <p class="text-2xl font-bold">{{ $inscriptions->where('poste', 'Milieu')->count() }}</p>
            </div>
            <!-- Carte statistique 4 -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-gray-500 text-sm">Attaquants</h3>
                <p class="text-2xl font-bold">{{ $inscriptions->where('poste', 'Attaquant')->count() }}</p>
            </div>
        </div>
    </div>

    <!-- Tableau des inscrits -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6 border-b">
            <h2 class="text-xl font-semibold">Liste des inscriptions inscrits</h2>
            <div class="flex justify-end mb-4">
            <a href="{{ route('dashboard.export') }}" class="py-2 px-4 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50">
                Exporter en Excel
            </a>
        </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dossard</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom Maillot</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Poste</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Taille</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Téléphone</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($inscriptions as $inscription)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            #{{ $inscription->dossard }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $inscription->nom }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $inscription->nom_maillot }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                @switch($inscription->poste)
                                    @case('Gardien')
                                        bg-yellow-100 text-yellow-800
                                        @break
                                    @case('Défenseur')
                                        bg-blue-100 text-blue-800
                                        @break
                                    @case('Milieu')
                                        bg-green-100 text-green-800
                                        @break
                                    @case('Attaquant')
                                        bg-red-100 text-red-800
                                        @break
                                @endswitch
                            ">
                                {{ $inscription->poste }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $inscription->taille_maillot }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $inscription->telephone }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex space-x-2">
                                <button class="text-blue-600 hover:text-blue-900">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button>
                                <button class="text-red-600 hover:text-red-900">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection