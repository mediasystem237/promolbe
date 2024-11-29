document.addEventListener("DOMContentLoaded", function () {
    // 1. Compte à rebours
    const matchDate = new Date("2024-12-21T00:00:00Z").getTime();  // Date du match
    const countdownElement = document.getElementById('countdown');
    const daysElement = document.getElementById('days');
    const hoursElement = document.getElementById('hours');
    const minutesElement = document.getElementById('minutes');
    const secondsElement = document.getElementById('seconds');

    function updateCountdown() {
        const now = new Date().getTime();  // Heure actuelle
        const distance = matchDate - now;  // Temps restant jusqu'au match

        if (distance > 0) {
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            daysElement.textContent = days;
            hoursElement.textContent = hours;
            minutesElement.textContent = minutes;
            secondsElement.textContent = seconds;
        } else {
            countdownElement.innerHTML = "Le match commence !";
        }
    }

    setInterval(updateCountdown, 1000);
    updateCountdown(); // Initialisation immédiate

  // Écouter la soumission du formulaire d'inscription
/*document.getElementById('form-inscription').addEventListener('submit', function (event) {
    event.preventDefault();  // Empêcher la soumission par défaut

    // Récupérer les données du formulaire
    let formData = new FormData(this);

    // Envoyer les données via AJAX
    fetch('/inscription', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Remplir les détails dans la modale
            document.getElementById('recap-nom').textContent = data.data.nom;
            document.getElementById('recap-nom-maillot').textContent = data.data.nom_maillot;
            document.getElementById('recap-poste').textContent = data.data.poste;
            document.getElementById('recap-dossard').textContent = data.data.dossard;
            document.getElementById('recap-taille-maillot').textContent = data.data.taille_maillot;
            document.getElementById('recap-telephone').textContent = data.data.telephone;
            document.getElementById('recap-telephone-message').textContent = data.data.telephone;

            // Afficher la section de succès
            document.getElementById('success-message').classList.remove('hidden');
            document.getElementById('error-message').classList.add('hidden');

            // Afficher la modale
            document.getElementById('confirmation-modal').classList.remove('hidden');
        } else {
            // Si l'inscription échoue, afficher un message d'erreur
            document.getElementById('error-detail').textContent = data.message;
            document.getElementById('success-message').classList.add('hidden');
            document.getElementById('error-message').classList.remove('hidden');
            
            // Afficher la modale
            document.getElementById('confirmation-modal').classList.remove('hidden');
        }
    })
    .catch(error => {
        console.error('Erreur:', error);
        alert('Une erreur est survenue.');
    });
});

// Fermer la modale lorsque l'utilisateur clique sur la croix
document.getElementById('close-modal-cross').addEventListener('click', function () {
    document.getElementById('confirmation-modal').classList.add('hidden');
});

// Fermer la modale après la réussite
document.getElementById('close-modal-success').addEventListener('click', function () {
    document.getElementById('confirmation-modal').classList.add('hidden');
});

// Fermer la modale après une erreur
document.getElementById('close-modal-error').addEventListener('click', function () {
    document.getElementById('confirmation-modal').classList.add('hidden');
});*/

});
