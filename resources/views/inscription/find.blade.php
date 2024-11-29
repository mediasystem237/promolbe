@extends('layouts.app') {{-- Supposons que votre layout principal est "app.blade.php" --}}

@section('content')
<div class="flex flex-col min-h-screen justify-between">
    <div class="container mx-auto max-w-md mt-12 pt-16"> <!-- Ajout de pt-16 pour espacer la navbar -->
        <h1 class="text-2xl font-bold text-center mb-6">Modifier votre inscription</h1>
        
        {{-- Affichage des messages d'erreur --}}
        @if (session('error'))
            <div class="text-red-500 mb-4">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('inscription.edit') }}" class="space-y-4">
            @csrf
            <div>
                <label for="telephone" class="block text-gray-700 font-medium">Numéro de téléphone</label>
                <input 
                    type="text" 
                    id="telephone" 
                    name="telephone" 
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300" 
                    placeholder="Ex: 699123456" 
                    required 
                />
            </div>

            <button 
                type="submit" 
                class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300"
            >
                Rechercher
            </button>
        </form>
    </div>

  
</div>
@endsection
