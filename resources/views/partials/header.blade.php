
<header class="bg-white shadow-md p-4 flex justify-between items-center sticky top-0 z-40">
    <div class="flex items-center">
        {{-- Mobile Sidebar Toggle Button --}}
        <button id="mobile-sidebar-toggle" class="lg:hidden mr-4 text-gray-700 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
        
        {{-- Page Title --}}
        <h1 class="text-xl font-semibold text-gray-800">
            @yield('page-title', 'Dashboard')
        </h1>
    </div>
    
    {{-- Header Actions --}}
    <div class="flex items-center space-x-6">
        {{-- Notifications (Optional) --}}
        <div class="relative">
            <button class="text-gray-600 hover:text-gray-800 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                {{-- Optional notification badge --}}
                <span class="absolute top-0 right-0 block h-2 w-2 rounded-full ring-2 ring-white bg-red-400"></span>
            </button>
        </div>

    </div>
</header>

{{-- Optional JavaScript for Dropdown and Mobile Sidebar Toggle --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const userMenuToggle = document.getElementById('user-menu-toggle');
    const userDropdown = document.getElementById('user-dropdown');
    const mobileSidebarToggle = document.getElementById('mobile-sidebar-toggle');
    const sidebar = document.querySelector('aside');

    // User Dropdown Toggle
    userMenuToggle?.addEventListener('click', () => {
        userDropdown.classList.toggle('hidden');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', (event) => {
        if (!userMenuToggle?.contains(event.target) && !userDropdown?.contains(event.target)) {
            userDropdown.classList.add('hidden');
        }
    });

    // Mobile Sidebar Toggle
    mobileSidebarToggle?.addEventListener('click', () => {
        sidebar?.classList.toggle('-translate-x-full');
    });
});
</script>
@endpush