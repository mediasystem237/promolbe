{{-- resources/views/partials/_navigation.blade.php --}}
<nav class="fixed w-full top-0 left-0 z-50">
    {{-- Advanced Glassmorphism Background --}}
    <div class="absolute inset-0 bg-gradient-to-r from-[#2c6e4d]/95 to-[#1e5038]/95 
                backdrop-blur-xl shadow-2xl"></div>
    
    <div class="container mx-auto px-4 relative">
        <div class="flex justify-between items-center h-20">
            {{-- Logo with Enhanced Hover Effect --}}
            <a href="/" class="group flex items-center space-x-3">
                <div class="w-12 h-12 rounded-xl bg-white/15 flex items-center justify-center 
                            backdrop-blur-sm shadow-md 
                            group-hover:rotate-6 group-hover:scale-110 
                            transition-all duration-400 ease-out">
                    <span class="text-3xl font-bold text-white drop-shadow-md">L</span>
                </div>
                <span class="text-2xl font-bold text-white 
                             group-hover:text-orange-300 
                             transition-colors duration-300 
                             drop-shadow-md">
                    Lycée Bilingue d'Émana
                </span>
            </a>

            {{-- Desktop Navigation with Advanced Styling --}}
            <div class="hidden md:flex items-center space-x-2 ml-auto">
                @foreach(['Accueil', 'À propos', 'Anciens élèves', 'Événements', 'Contact'] as $item)
                    <a href="#{{ Str::slug($item) }}" class="nav-link group">
                        <span class="relative px-4 py-2 overflow-hidden">
                            {{ $item }}
                            <span class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r 
                                       from-transparent via-orange-400 to-transparent 
                                       transform -translate-x-full 
                                       group-hover:translate-x-0 
                                       transition-transform duration-400 ease-out"></span>
                        </span>
                    </a>
                @endforeach
                
                {{-- Dashboard Link --}}
                <a href="{{ route('dashboard') }}"
                    class="px-4 py-2 bg-white/10 rounded-lg text-white 
                           hover:bg-white/20 transition-all duration-300 
                           {{ request()->routeIs('dashboard') ? 'bg-orange-500/30' : '' }}">
                    Dashboard
                </a>
            </div>

            {{-- Mobile Menu Button with Advanced Animation --}}
            <button onclick="toggleMobileMenu()" 
                    class="md:hidden w-12 h-12 flex items-center justify-center 
                           rounded-xl hover:bg-white/15 
                           transition-all duration-300" 
                    aria-label="Menu">
                <div class="burger-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
        </div>
    </div>
</nav>

<style>
    /* Enhanced Navigation Styles */
    .nav-link {
        @apply relative text-white/90 hover:text-white 
               text-sm font-medium transition-all duration-300;
    }

    /* Burger Menu Animation Refined */
    .burger-menu {
        @apply relative w-7 h-6;
    }

    .burger-menu span {
        @apply absolute left-0 w-full h-0.5 bg-white 
               transform transition-all duration-400 
               origin-center;
    }

    .burger-menu span:first-child { @apply top-0; }
    .burger-menu span:nth-child(2) { @apply top-1/2 -translate-y-1/2; }
    .burger-menu span:last-child { @apply bottom-0; }

    .menu-open .burger-menu span:first-child {
        @apply top-1/2 rotate-45 translate-y-0;
    }

    .menu-open .burger-menu span:nth-child(2) {
        @apply opacity-0 scale-x-0;
    }

    .menu-open .burger-menu span:last-child {
        @apply top-1/2 -rotate-45 translate-y-0;
    }
</style>

<script>
function toggleMobileMenu() {
    const button = document.querySelector('button');
    const menu = document.getElementById('mobile-menu');
    button.classList.toggle('menu-open');
    menu.classList.toggle('active');
}

// Enhanced Scroll Effect
window.addEventListener('scroll', () => {
    const nav = document.querySelector('nav');
    if (window.scrollY > 20) {
        nav.classList.add('bg-opacity-95', 'shadow-2xl');
    } else {
        nav.classList.remove('bg-opacity-95', 'shadow-2xl');
    }
});
</script>