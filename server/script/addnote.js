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

function createNoteElement(title, content) {
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
        note.remove();
        checkNoNotes();
    });
    noteIcons.appendChild(deleteIcon);

    note.appendChild(noteIcons);
    document.getElementById('noteContainer').appendChild(note);
    checkNoNotes(); // Update "No notes" visibility
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
    const userId = 7;  // Replace this with the actual user_id

    if (title.trim() === '' || content.trim() === '') {
        alert('Title and content cannot be empty.');
        return;
    }

    // Send the data to the PHP script via AJAX
    const data = new FormData();
    data.append('title', title);
    data.append('content', content);
    data.append('user_id', userId);  // Add user_id to the form data

    fetch('/noctyx/server/php/save-note.php', {
        method: 'POST',
        body: data
    })
    .then(response => response.text())
    .then(data => {
        console.log(data); // Handle the response from the PHP script
        createNoteElement(title, content); // Add the note to the UI
        closeModal();
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
document.addEventListener('DOMContentLoaded', checkNoNotes);
