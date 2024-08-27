// script.js

document.addEventListener('DOMContentLoaded', () => {
    const darkModeToggle = document.getElementById('dark-theme');
    const body = document.body;

    // Check for existing cookie
    if (document.cookie.split('; ').find(row => row.startsWith('theme='))?.split('=')[1] === 'dark') {
        body.classList.add('dark-mode');
        darkModeToggle.checked = true;
    }

    // Toggle dark mode on checkbox change
    darkModeToggle.addEventListener('change', () => {
        if (darkModeToggle.checked) {
            body.classList.add('dark-mode');
            document.cookie = "theme=dark; path=/";
        } else {
            body.classList.remove('dark-mode');
            document.cookie = "theme=light; path=/";
        }
    });
});
