function searchNotes() {
    const searchQuery = document.querySelector('.search-input').value;

    if (searchQuery.trim() === '') {
        window.location.href = '/noctyx/client/pages/homemenu.php';
    } else {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', '/noctyx/server/php/search-bar.php?query=' + encodeURIComponent(searchQuery), true);
        xhr.onload = function() {
            if (this.status === 200) {
                const noteContainer = document.getElementById('noteContainer');
                noteContainer.innerHTML = this.responseText;

                // Reattach event listeners to the newly fetched notes
                attachNoteEventListeners();

                // Check if no notes are found and display the "No notes" message
                
            }
        };
        xhr.send();
    }
}

function attachNoteEventListeners() {
    const notes = document.querySelectorAll('.note');

    notes.forEach(note => {
        const noteId = note.dataset.id;
        const editIcon = note.querySelector('img[alt="Edit"]');
        const deleteIcon = note.querySelector('img[alt="Delete"]');

        editIcon.addEventListener('click', function() {
            fetch(`/noctyx/server/php/get-note.php?id=${noteId}`)
                .then(response => response.json())
                .then(data => {
                    const title = data.title;
                    const content = data.content;

                    document.getElementById('noteTitle').value = title;
                    document.getElementById('noteContent').value = content;
                    openModal();
                    isEditing = true;
                    editIndex = noteId; // Set editIndex to the note's ID
                })
                .catch(error => {
                    console.error('Error fetching note:', error);
                });
        });

        deleteIcon.addEventListener('click', function() {
            const noteElement = this.closest('.note');
            const id = noteElement.dataset.id;

            const overlay = document.getElementById('deleteConfirmationOverlay');
            overlay.style.display = 'flex';

            document.getElementById('confirmDelete').onclick = function() {
                const data = new FormData();
                data.append('id', id);

                fetch('/noctyx/server/php/del-notes.php', {
                    method: 'POST',
                    body: data
                })
                .then(response => response.text())
                .then(data => {
                    if (data === 'Note deleted successfully') {
                        noteElement.remove();
                        checkNoNotes();
                    } else {
                        alert('Failed to delete the note.');
                    }
                })
                .catch(error => {
                    console.error('Error deleting note:', error);
                });

                overlay.style.display = 'none';
            };

            document.getElementById('cancelDelete').onclick = function() {
                overlay.style.display = 'none';
            };
        });
    });
}

// Initialize event listeners for existing notes on page load
document.addEventListener('DOMContentLoaded', function() {
    attachNoteEventListeners();
});
