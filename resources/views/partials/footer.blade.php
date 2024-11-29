<!-- Footer pour la plateforme des Anciens Élèves du Lycée Bilingue d'Emana -->
<footer class="bg-primary text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-4 gap-8">
            <!-- Colonne Informations -->
            <div>
                <h3 class="text-xl font-bold mb-4">Lycée Bilingue d'Emana</h3>
                <p class="text-white/80 mb-4">
                    Réseau des anciens élèves, connectant les générations et célébrant notre héritage éducatif.
                </p>
            </div>

            <!-- Colonne Liens Rapides -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Liens Rapides</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-secondary transition">Accueil</a></li>
                    <li><a href="#" class="hover:text-secondary transition">Événements</a></li>
                    <li><a href="#" class="hover:text-secondary transition">Annuaire</a></li>
                    <li><a href="#" class="hover:text-secondary transition">Connexion</a></li>
                </ul>
            </div>

            <!-- Colonne Événements -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Prochains Événements</h4>
                <ul class="space-y-2">
                    <li>
                        <div class="flex items-center">
                            <span class="mr-2 text-secondary">•</span>
                            <span>Match du 21 Décembre</span>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <span class="mr-2 text-secondary">•</span>
                            <span>Réunion Annuelle</span>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <span class="mr-2 text-secondary">•</span>
                            <span>Journée Portes Ouvertes</span>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Colonne Contact -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Contactez-nous</h4>
                <div class="space-y-2">
                    <p class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        contact@lyceeemana.cm
                    </p>
                    <p class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h3m-3-8a5 5 0 01-5 5v0a5 5 0 01-5-5v-2a5 5 0 015-5v0a5 5 0 015 5v2z" />
                        </svg>
                        +237 6xx xxx xxx
                    </p>
                </div>
            </div>
        </div>

        <!-- Séparateur -->
        <div class="border-t border-white/20 mt-8 pt-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-sm text-white/80 mb-2 md:mb-0">
                    © {{ date('Y') }} Lycée Bilingue d'Emana. Tous droits réservés.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-white hover:text-secondary transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                        </svg>
                    </a>
                    <a href="#" class="text-white hover:text-secondary transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                        </svg>
                    </a>
                    <a href="#" class="text-white hover:text-secondary transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>