window.addEventListener('load', () => {
    const loadingOverlay = document.getElementById('loading-overlay');
    setTimeout(() => {
        loadingOverlay.classList.add('hidden');
    }, 2000); // Durée avant disparition (3 secondes)
});