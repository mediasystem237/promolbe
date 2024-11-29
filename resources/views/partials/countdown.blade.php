{{-- resources/views/components/_countdown.blade.php --}}
<div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-[#246d40]/10 to-[#1a4d2e]/10 p-8 shadow-lg backdrop-blur-sm">
    {{-- Decorative elements --}}
    <div class="absolute -top-20 -right-20 w-40 h-40 bg-orange-400/10 rounded-full filter blur-3xl"></div>
    <div class="absolute -bottom-20 -left-20 w-40 h-40 bg-[#246d40]/10 rounded-full filter blur-3xl"></div>
    
    <div class="relative text-center space-y-6">
        <div class="space-y-2">
            <h3 class="text-2xl font-bold bg-gradient-to-r from-[#246d40] to-[#1a4d2e] inline-block text-transparent bg-clip-text">
                Compte à rebours
            </h3>
            <p class="text-gray-600">
                <span class="inline-block bg-white/50 rounded-full px-4 py-1 text-sm backdrop-blur-sm">
                    21 Décembre 2024
                </span>
            </p>
        </div>

        <div class="grid grid-cols-4 gap-4 max-w-3xl mx-auto">
            <div class="countdown-box">
                <span id="days" class="countdown-number">00</span>
                <span class="countdown-label">Jours</span>
            </div>
            
            <div class="countdown-box">
                <span id="hours" class="countdown-number">00</span>
                <span class="countdown-label">Heures</span>
            </div>
            
            <div class="countdown-box">
                <span id="minutes" class="countdown-number">00</span>
                <span class="countdown-label">Minutes</span>
            </div>
            
            <div class="countdown-box">
                <span id="seconds" class="countdown-number">00</span>
                <span class="countdown-label">Secondes</span>
            </div>
        </div>
    </div>
</div>

<style>
    .countdown-box {
        @apply bg-white/70 rounded-2xl p-4 backdrop-blur-sm
               shadow-lg hover:shadow-xl transform hover:-translate-y-1
               transition-all duration-300 relative overflow-hidden;
    }

    .countdown-box::before {
        @apply content-[''] absolute inset-0 bg-gradient-to-br
               from-[#246d40]/10 to-transparent opacity-0 hover:opacity-100
               transition-opacity duration-300;
    }

    .countdown-number {
        @apply block text-3xl lg:text-4xl font-bold mb-1
               bg-gradient-to-r from-[#246d40] to-[#1a4d2e]
               text-transparent bg-clip-text;
    }

    .countdown-label {
        @apply block text-sm text-gray-600 font-medium;
    }

    @keyframes pulse-subtle {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.02); }
    }

    .animate-pulse-subtle {
        animation: pulse-subtle 2s infinite;
    }
</style>

<script>
function updateCountdown() {
    const targetDate = new Date('December 21, 2024 00:00:00').getTime();
    
    function update() {
        const now = new Date().getTime();
        const distance = targetDate - now;

        // Calculate time units
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Update DOM with padded numbers
        document.getElementById('days').textContent = String(days).padStart(2, '0');
        document.getElementById('hours').textContent = String(hours).padStart(2, '0');
        document.getElementById('minutes').textContent = String(minutes).padStart(2, '0');
        document.getElementById('seconds').textContent = String(seconds).padStart(2, '0');

        // Animate seconds box
        const secondsBox = document.getElementById('seconds').parentElement;
        secondsBox.classList.add('animate-pulse-subtle');
        setTimeout(() => secondsBox.classList.remove('animate-pulse-subtle'), 1000);

        if (distance < 0) {
            clearInterval(interval);
            document.getElementById('countdown').innerHTML = "L'événement a commencé!";
        }
    }

    // Initial update
    update();
    // Update every second
    const interval = setInterval(update, 1000);
}

// Start countdown when DOM is loaded
document.addEventListener('DOMContentLoaded', updateCountdown);
</script>