function showReminder() {
    localStorage.setItem('reminder', 'true');
    window.location.href = 'target.html'; // Redirect to the target page
}