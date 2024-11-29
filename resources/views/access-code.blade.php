@extends('layouts.admin')

@section('title', 'Code d\'Accès')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 to-indigo-200 px-4 py-8">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-2xl rounded-2xl overflow-hidden">
            <div class="bg-gradient-to-r from-indigo-600 to-purple-700 text-white px-6 py-5">
                <h1 class="text-3xl font-bold tracking-tight">Authentification</h1>
                <p class="text-indigo-100 mt-2">Veuillez saisir votre code d'accès</p>
            </div>

            <form method="POST" action="{{ route('dashboard.access') }}" class="p-8 space-y-6">
                @csrf
                <div>
                    <label for="access_code" class="block text-sm font-medium text-gray-700 mb-2">
                        Code d'accès <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input 
                            type="text" 
                            id="access_code" 
                            name="access_code" 
                            pattern="\d{6}" 
                            required 
                            maxlength="6" 
                            minlength="6" 
                            placeholder="• • • • • •"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg 
                                   text-center tracking-[0.5em] text-2xl font-bold 
                                   focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 
                                   transition duration-300 
                                   placeholder-gray-400"
                        >
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                    </div>
                </div>

                @if(session('error'))
                    <div class="bg-red-50 border border-red-300 text-red-700 px-4 py-3 rounded-lg">
                        <p class="text-sm">{{ session('error') }}</p>
                    </div>
                @endif

                <button 
                    type="submit" 
                    class="w-full py-3 px-4 bg-gradient-to-r from-indigo-600 to-purple-700 
                           text-white font-bold rounded-lg shadow-lg 
                           hover:from-indigo-700 hover:to-purple-800 
                           focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 
                           transition duration-300 ease-in-out transform 
                           hover:-translate-y-1 hover:scale-[1.02]"
                >
                    Accéder au Tableau de Bord
                </button>
            </form>
        </div>

        <div class="text-center mt-6 text-gray-500">
            <p class="text-sm">
                &copy; {{ date('Y') }} Powored by MEDIA SYSTEM . Tous droits réservés.
            </p>
        </div>
    </div>
</div>
@endsection