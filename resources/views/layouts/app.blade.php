<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Balise CSRF -->
    <title>@yield('title', 'Inscription au match')</title>

    <!-- Inclure le fichier CSS compilé par Vite -->
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <!-- Header partial -->
        @include('partials.navigation')
       
        <!-- Contenu principal de la page -->
        @yield('content')
    </div>

    <!-- Footer partial -->
    @include('partials.footer')

    <!-- Inclure les fichiers JS compilés par Vite -->
    @vite('resources/js/app.js')
    <script src="{{ asset('js/inscription.js') }}"></script> <!-- Le script JS après la balise meta -->
</body>
</html>
