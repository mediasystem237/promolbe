<div class="bg-white shadow-md rounded-lg p-6 max-w-md mx-auto">
    <div class="text-center">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Gérer vos informations</h2>
        <p class="text-gray-600 mb-6">
            Vous êtes déjà inscrit et souhaitez mettre à jour vos informations ?
        </p>
        
        <div class="flex justify-center">
            <a href="{{ route('inscription.find') }}" 
               class="inline-flex items-center justify-center 
                      bg-blue-600 text-white 
                      py-3 px-6 
                      rounded-lg 
                      hover:bg-blue-700 
                      focus:outline-none 
                      focus:ring-2 
                      focus:ring-blue-500 
                      focus:ring-offset-2 
                      transition-colors 
                      duration-300 
                      group"
               aria-label="Modifier vos données personnelles">
                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="h-5 w-5 mr-2 group-hover:animate-spin" 
                     fill="none" 
                     viewBox="0 0 24 24" 
                     stroke="currentColor">
                    <path stroke-linecap="round" 
                          stroke-linejoin="round" 
                          stroke-width="2" 
                          d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" 
                          stroke-linejoin="round" 
                          stroke-width="2" 
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Modifier vos données
            </a>
        </div>
    </div>
</div>