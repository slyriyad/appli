document.addEventListener('DOMContentLoaded', function() {
    const successAlert = document.getElementById('successAlert');
    if (successAlert) {
        // Disparaît au bout de 3 secondes
        setTimeout(function() {
            successAlert.style.display = 'none';
        }, 3000);
    }
});

