// Function to show overlay
function showOverlay(message) {
    const overlay = document.getElementById('overlay');
    const errorMessage = document.getElementById('errorMessage');

    errorMessage.textContent = message;
    overlay.classList.add('show'); // Show overlay

    // Hide the overlay after 3 seconds
    setTimeout(() => {
        overlay.classList.remove('show');
    }, 1500);
}

// Check if there's an error or success parameter in the URL
const urlParams = new URLSearchParams(window.location.search);
const error = urlParams.get('error');
const success = urlParams.get('sign_up_success');

if (error) {
    showOverlay(decodeURIComponent(error));
}

if (success) {
    showOverlay("Sign-up successful! Please log in.");
}