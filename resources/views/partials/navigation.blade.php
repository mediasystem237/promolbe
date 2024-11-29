{{-- resources/views/partials/_navigation.blade.php --}}
<nav class="fixed w-full top-0 left-0 z-50">
    {{-- Glassmorphism background --}}
    <div class="absolute inset-0 bg-gradient-to-r from-[#246d40]/90 to-[#1a4d2e]/90 backdrop-blur-md shadow-lg"></div>
    
    <div class="container mx-auto px-4 relative">
        <div class="flex justify-between items-center h-20">
            {{-- Animated Logo --}}
            <a href="/" class="group flex items-center space-x-3">
                <div class="w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center backdrop-blur-sm 
                            group-hover:rotate-12 transition-all duration-300">
                    <span class="text-2xl font-bold text-white">L</span>
                </div>
                <span class="text-xl font-semibold text-white group-hover:text-orange-300 transition-colors">
                    Lycée Bilingue d'Émana
                </span>
            </a>

            {{-- Desktop Menu with Modern Design --}}
            <div class="hidden md:flex items-center space-x-1 ml-auto">
                @foreach(['Accueil', 'À propos', 'Anciens élèves', 'Événements', 'Contact'] as $item)
                    <a href="#{{ Str::slug($item) }}" class="nav-link">
                        <span class="relative px-4 py-2">
                            {{ $item }}
                            <span class="absolute inset-x-4 bottom-0 h-px bg-gradient-to-r from-transparent via-orange-300 to-transparent 
                                       scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                        </span>
                    </a>
                @endforeach
                
                {{-- Call-to-action Button --}}
                <a href="/contact" class="ml-4 px-6 py-2 rounded-full bg-orange-400 text-white font-medium
                                       hover:bg-orange-500 active:bg-orange-600 transition-all duration-300
                                       shadow-lg hover:shadow-orange-400/30">
                    Nous contacter
                </a>
            </div>

            {{-- Animated Mobile Menu Button --}}
            <button onclick="toggleMobileMenu()" class="md:hidden w-10 h-10 flex items-center justify-center rounded-lg
                           hover:bg-white/10 transition-colors" aria-label="Menu">
                <div class="burger-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
        </div>


    </div>
</nav>

{{-- Include the styles in your layout --}}
<style>
    /* Modern Nav Link Styling */
    .nav-link {
        @apply relative text-white/90 hover:text-white text-sm font-medium transition-colors duration-300
               group flex items-center;
    }

    /* Burger Menu Animation */
    .burger-menu {
        @apply relative w-6 h-5;
    }

    .burger-menu span {
        @apply absolute left-0 w-full h-0.5 bg-white transform transition-all duration-300;
    }

    .burger-menu span:first-child {
        @apply top-0;
    }

    .burger-menu span:nth-child(2) {
        @apply top-1/2 -translate-y-1/2;
    }

    .burger-menu span:last-child {
        @apply bottom-0;
    }

    .menu-open .burger-menu span:first-child {
        @apply top-1/2 rotate-45;
    }

    .menu-open .burger-menu span:nth-child(2) {
        @apply opacity-0;
    }

    .menu-open .burger-menu span:last-child {
        @apply top-1/2 -rotate-45;
    }

    /* Mobile Menu Styling */
    .mobile-menu {
        @apply fixed left-0 right-0 top-20 bg-[#246d40]/95 backdrop-blur-md
               p-4 rounded-b-2xl shadow-xl transition-all duration-300 transform
               -translate-y-full opacity-0 invisible md:hidden;
    }

    .mobile-menu.active {
        @apply translate-y-0 opacity-100 visible;
    }

    .mobile-link {
        @apply block py-3 px-4 text-white/90 hover:text-white text-lg font-medium
               hover:bg-white/10 rounded-xl transition-all duration-300 mb-1;
    }

    /* Additional Styling for Active States */
    .mobile-menu.active .mobile-link {
        @apply text-white/100;
    }
</style>

<script>
function toggleMobileMenu() {
    const button = document.querySelector('button');
    const menu = document.getElementById('mobile-menu');
    button.classList.toggle('menu-open');
    menu.classList.toggle('active');
}

// Add scroll effect
window.addEventListener('scroll', () => {
    const nav = document.querySelector('nav');
    if (window.scrollY > 20) {
        nav.classList.add('shadow-2xl');
    } else {
        nav.classList.remove('shadow-2xl');
    }
});
</script>
