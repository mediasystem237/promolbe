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

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">Liste des inscriptions</h2>
            <a href="{{ route('dashboard.export') }}" 
            class="px-4 py-2 bg-gradient-to-r from-green-500 to-emerald-600 
                    text-white font-semibold rounded-lg 
                    hover:from-green-600 hover:to-emerald-700 
                    transition-all duration-300 
                    flex items-center space-x-2 
                    shadow-md hover:shadow-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span>Exporter en Excel</span>
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        @php
                            $columns = [
                                'dossard' => 'Dossard', 
                                'nom' => 'Nom', 
                                'nom_maillot' => 'Nom Maillot', 
                                'poste' => 'Poste', 
                                'taille_maillot' => 'Taille', 
                                'telephone' => 'Téléphone'
                            ];
                        @endphp
                        @foreach($columns as $key => $label)
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <a href="{{ route('dashboard') }}?sort_by={{ $key }}&direction={{ request('direction') == 'asc' ? 'desc' : 'asc' }}" 
                                class="flex items-center hover:text-gray-700 transition-colors">
                                    {{ $label }}
                                    @if(request('sort_by') == $key)
                                        <span class="ml-2 text-blue-500">
                                            {!! request('direction') == 'asc' ? '&#9650;' : '&#9660;' !!}
                                        </span>
                                    @endif
                                </a>
                            </th>
                        @endforeach
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($inscriptions as $inscription)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            #{{ $inscription->dossard }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            {{ $inscription->nom }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            {{ $inscription->nom_maillot }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
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
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            {{ $inscription->taille_maillot }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            {{ $inscription->telephone }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <div class="flex space-x-2">
                                <button class="text-blue-500 hover:text-blue-700 transition-colors group">
                                    <svg class="h-5 w-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button>
                                <button class="text-red-500 hover:text-red-700 transition-colors group">
                                    <svg class="h-5 w-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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