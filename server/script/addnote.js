let isEditing = false;
let editIndex = null;

function openModal() {
    document.getElementById('noteModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('noteModal').style.display = 'none';
    document.getElementById('noteTitle').value = '';
    document.getElementById('noteContent').value = '';
    isEditing = false;
    editIndex = null;
}

function createNoteElement(id, title, content, ndate) {
    const note = document.createElement('div');
    note.className = 'note';
    note.dataset.id = id;

    const noteContent = document.createElement('div');
    noteContent.className = 'note-content';

    const formattedContent = content.replace(/\n/g, '<br>');
    noteContent.innerHTML = `<strong>${title}</strong><br>${formattedContent}`;
    note.appendChild(noteContent);

    const noteTimestamp = document.createElement('div');
    noteTimestamp.className = 'note-timestamp';
    noteTimestamp.textContent = `Last update: ${new Date(ndate).toLocaleString()}`;
    note.appendChild(noteTimestamp);

    const noteIcons = document.createElement('div');
    noteIcons.className = 'note-icons';

    const editIcon = document.createElement('img');
    editIcon.src = '../assets/edit-icon.png';
    editIcon.alt = 'Edit';
    editIcon.addEventListener('click', function() {
        document.getElementById('noteTitle').value = title;
        document.getElementById('noteContent').value = content;
        openModal();
        isEditing = true;
        editIndex = id;
    });
    noteIcons.appendChild(editIcon);

    const deleteIcon = document.createElement('img');
    deleteIcon.src = '../assets/delete-icon.png';
    deleteIcon.alt = 'Delete';
    deleteIcon.addEventListener('click', function() {
        // Show the confirmation overlay
        const overlay = document.getElementById('deleteConfirmationOverlay');
        overlay.style.display = 'flex';

        // Handle the confirmation button click
        document.getElementById('confirmDelete').onclick = function() {
            // Proceed with deletion
            const data = new FormData();
            data.append('id', id);

            fetch('/noctyx/server/php/del-notes.php', {
                method: 'POST',
                body: data
            })
            .then(response => response.text())
            .then(data => {
                console.log(data);
                if (data === 'Note deleted successfully') {
                    note.remove();
                    checkNoNotes();
                } else {
                    alert('Failed to delete the note.');
                }
            })
            .catch(error => {
                console.error('Error deleting note:', error);
            });

            // Hide the overlay after deletion
            overlay.style.display = 'none';
        };

        // Handle the cancel button click
        document.getElementById('cancelDelete').onclick = function() {
            overlay.style.display = 'none';
        };
    });

    noteIcons.appendChild(deleteIcon);

    note.appendChild(noteIcons);
    document.getElementById('noteContainer').appendChild(note);
}

function checkNoNotes() {
    const noteContainer = document.getElementById('noteContainer');
    const noNotes = document.getElementById('noNotes');
    if (noteContainer.children.length > 1) {
        noNotes.style.display = 'none';
    } else {
        noNotes.style.display = 'flex';
    }
}

function showCustomAlert(message) {
    document.getElementById('customAlertMessage').textContent = message;
    document.getElementById('customAlert').style.display = 'flex';
}

document.getElementById('customAlertClose').addEventListener('click', function() {
    document.getElementById('customAlert').style.display = 'none';
});

// Save note functionality
document.getElementById('saveNote').addEventListener('click', function() {
    const title = document.getElementById('noteTitle').value;
    const content = document.getElementById('noteContent').value;

    if (title.trim() === '' || content.trim() === '') {
        showCustomAlert('Title and content cannot be empty.');
        return;
    }

    const data = new FormData();
    data.append('title', title);
    data.append('content', content);
    if (isEditing) {
        data.append('editIndex', editIndex); // Pass the note ID to the server for updating
    }

    fetch('/noctyx/server/php/save-note.php', {
        method: 'POST',
        body: data
    })
    .then(response => response.text())
    .then(data => {
        if (data === 'Note saved successfully') {
            if (isEditing) {
                const noteElement = document.querySelector(`[data-id="${editIndex}"]`);
                if (noteElement) {
                    noteElement.querySelector('.note-content').innerHTML = `<strong>${title}</strong><br>${content.replace(/\n/g, '<br>')}`;
                    noteElement.querySelector('.note-timestamp').textContent = `Last update: ${new Date().toLocaleString()}`;
                }
            } else {
                createNoteElement(editIndex, title, content, new Date().toISOString()); // Add the new note to the UI
            }
            closeModal();
        } else {
            showCustomAlert(data); // Display error message
        }
    })
    .catch(error => {
        console.error('Error saving note:', error);
    });
});

window.onclick = function(event) {
    if (event.target === document.getElementById('noteModal')) {
        closeModal();
    }
}

// Check if there are any notes on page load
document.addEventListener('DOMContentLoaded', function() {
    fetch('/noctyx/server/php/display-notes.php')
        .then(response => response.text())
        .then(data => {
            if (data.trim() !== '') {
                const notes = data.split('\n').filter(note => note.trim() !== '');
                notes.forEach(note => {
                    const [id, title, content, ndate] = note.split('|');
                    createNoteElement(id, title, content, ndate);
                });
            }
            checkNoNotes();
        })
        .catch(error => {
            console.error('Error fetching notes:', error);
        });
});
