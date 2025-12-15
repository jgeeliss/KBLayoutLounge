import './bootstrap';

// Highlight the link based on the current page nav link
document.addEventListener('DOMContentLoaded', () => {
    const allHeaderNavLinks = document.querySelectorAll('header nav a');
    const currentPath = window.location.pathname;

    // Match current URL path to nav links
    allHeaderNavLinks.forEach(link => {
        const linkPath = new URL(link.href).pathname;
        if (linkPath === currentPath) {
            link.classList.add('last-clicked');
        }
    });
});

// Toggle edit mode for comments when edit button is clicked
window.toggleEditComment = function(commentId) {
    const displayDiv = document.querySelector(`.comment-display-${commentId}`);
    const editDiv = document.querySelector(`.comment-edit-${commentId}`);
    // toggle visibility of display and edit divs
    if (displayDiv.style.display === 'none') {
        displayDiv.style.display = 'block';
        editDiv.style.display = 'none';
    } else {
        displayDiv.style.display = 'none';
        editDiv.style.display = 'block';
    }
};
