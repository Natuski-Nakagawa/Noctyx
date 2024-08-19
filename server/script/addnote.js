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

function createNoteElement(id, title, content) {
    const note = document.createElement('div');
    note.className = 'note';

    const noteContent = document.createElement('div');
    noteContent.className = 'note-content';

    // Replace newlines with <br> tags to preserve line breaks
    const formattedContent = content.replace(/\n/g, '<br>');
    noteContent.innerHTML = `<strong>${title}</strong><br>${formattedContent}`;
    note.appendChild(noteContent);

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
        editIndex = Array.from(document.getElementById('noteContainer').children).indexOf(note);
    });
    noteIcons.appendChild(editIcon);

    const deleteIcon = document.createElement('img');
    deleteIcon.src = '../assets/delete-icon.png';
    deleteIcon.alt = 'Delete';
    deleteIcon.addEventListener('click', function() {
        // Send the data to the PHP script via AJAX for deletion
        const data = new FormData();
        data.append('id', id); // Send the note ID to the server

        fetch('/noctyx/server/php/del-notes.php', {
            method: 'POST',
            body: data
        })
        .then(response => response.text())
        .then(data => {
            console.log(data); // Handle the response from the PHP script
            if (data === 'Note deleted successfully') {
                note.remove(); // Remove the note from the UI
                checkNoNotes();
            } else {
                alert('Failed to delete the note.'); // Handle deletion failure
            }
        })
        .catch(error => {
            console.error('Error deleting note:', error);
        });
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

document.getElementById('saveNote').addEventListener('click', function() {
    const title = document.getElementById('noteTitle').value;
    const content = document.getElementById('noteContent').value;

    if (title.trim() === '' || content.trim() === '') {
        alert('Title and content cannot be empty.');
        return;
    }

    // Send the data to the PHP script via AJAX
    const data = new FormData();
    data.append('title', title);
    data.append('content', content);

    // Append editIndex if in editing mode
    if (isEditing) {
        data.append('editIndex', editIndex);
    }

    fetch('/noctyx/server/php/save-note.php', {
        method: 'POST',
        body: data
    })
    .then(response => response.text())
    .then(data => {
        console.log(data); // Handle the response from the PHP script
        if (data === 'Note saved successfully') {
            if (isEditing) {
                document.getElementById('noteContainer').children[editIndex].querySelector('.note-content').innerHTML = `<strong>${title}</strong><br>${content.replace(/\n/g, '<br>')}`;
            } else {
                createNoteElement(null, title, content); // Add the note to the UI
            }
            closeModal();
        } else {
            alert(data); // Display error message
        }
    })
    .catch(error => {
        console.error('Error saving note:', error);
    });
});

window.onclick = function(event) {
    if (event.target == document.getElementById('noteModal')) {
        closeModal();
    }
};

// Check if there are any notes on page load
document.addEventListener('DOMContentLoaded', function() {
    // Fetch notes when the page loads
    fetch('/noctyx/server/php/display-notes.php')
        .then(response => response.text())
        .then(data => {
            if (data.trim() !== '') {
                const notes = data.split('\n').filter(note => note.trim() !== '');
                notes.forEach(note => {
                    const [id, title, content] = note.split('|');
                    createNoteElement(id, title, content);
                });
            }
            checkNoNotes(); // Update "No notes" visibility
        })
        .catch(error => {
            console.error('Error fetching notes:', error);
        });
});
