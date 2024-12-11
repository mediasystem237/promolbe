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
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut Paiement</th>
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
                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                            @if($inscription->paiement_maillot === 'Payé')
                                bg-green-100 text-green-800
                            @else
                                bg-red-100 text-red-800
                            @endif">
                            {{ $inscription->paiement_maillot }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <div class="flex space-x-2">
                            <form method="POST" action="{{ route('dashboard.update_payment', $inscription->id) }}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="paiement_maillot" value="{{ $inscription->paiement_maillot === 'Payé' ? 'Non payé' : 'Payé' }}">
                                <button type="submit" class="text-blue-500 hover:text-blue-700 transition-colors group">
                                    <svg class="h-5 w-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 9v4H8V9m8 0V5H8v4m8 4v4H8v-4" />
                                    </svg>
                                </button>
                            </form>
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