// Function to show overlay
function showOverlay(message) {
    document.getElementById('errorMessage').textContent = message;
    document.getElementById('overlay').classList.add('show');
    setTimeout(() => {
        document.getElementById('overlay').classList.remove('show');
    }, 3000); // Hide after 3 seconds
}

// Check if there's an error parameter in the URL
const urlParams = new URLSearchParams(window.location.search);
const error = urlParams.get('error');
if (error) {
    showOverlay(decodeURIComponent(error));
}