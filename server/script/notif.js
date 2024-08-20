// Function to show overlay
function showOverlay(message, type) {
    const overlay = document.querySelector('.overlay');
    const popup = document.querySelector('.popup');

    popup.textContent = message;

    // Remove any existing classes for error or success
    popup.classList.remove('error', 'success');

    // Add the appropriate class based on the message type
    if (type === 'error') {
        popup.classList.add('error');
    } else if (type === 'success') {
        popup.classList.add('success');
    }

    overlay.classList.add('show'); // Show overlay

    // Hide the overlay after 1.5 seconds
    setTimeout(() => {
        overlay.classList.remove('show');
    }, 1500);
}

// Check if there's an error or success parameter in the URL
const urlParams = new URLSearchParams(window.location.search);
const error = urlParams.get('error');
const success = urlParams.get('sign_up_success');

if (error) {
    showOverlay(decodeURIComponent(error), 'error');
}

if (success) {
    showOverlay("Sign-up successful! Please log in.", 'success');
}
