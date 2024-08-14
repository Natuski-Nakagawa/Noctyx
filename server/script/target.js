window.onload = function() {
    var urlParams = new URLSearchParams(window.location.search);
    var signUpSuccess = urlParams.get('sign_up_success');
    
    if (signUpSuccess === 'true') {
        localStorage.setItem('reminder', 'true');
        // Redirect to the target page (if needed) or refresh the page
        window.location.href = 'login.php';
    }

    var reminder = localStorage.getItem('reminder');
    if (reminder === 'true') {
        var overlay = document.getElementById('overlay');
        if (overlay) {
            overlay.style.display = 'flex';
            setTimeout(function() {
                hidePopup();
            }, 3000); // 3 seconds
        }
    }
};

function hidePopup() {
    var overlay = document.getElementById('overlay');
    if (overlay) {
        overlay.style.display = 'none';
    }
    localStorage.removeItem('reminder');
}
