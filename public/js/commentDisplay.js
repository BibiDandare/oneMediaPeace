document.addEventListener('DOMContentLoaded', function() {
    var commentButton = document.getElementById('commentsButton');
    var commentForm = document.querySelector('.commentForm');

    commentButton.addEventListener('click', function() {
      commentForm.style.display = commentForm.style.display === 'none' ? 'block' : 'none';
    });
});