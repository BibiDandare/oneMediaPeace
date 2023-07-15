document.addEventListener('DOMContentLoaded', function() {
    /*
    var commentContent = document.getElementById('content-' + commentsDiplayButton);
    var showHideLink = document.getElementById('show-hide-' + commentsDiplayButton);

    if (commentContent.style.display === 'none') {
        commentContent.style.display = 'block';
        showHideLink.innerText = 'Hide';
    } else {
        commentContent.style.display = 'none';
        showHideLink.innerText = 'Show';
    }
    */
    var commentLayout = document.getElementById('commentsDiplayButton');
    var commentDisplay = document.querySelector('.commentDiv');

    commentLayout.addEventListener('click', function() {
      commentDisplay.style.display = commentDisplay.style.display === 'none' ? 'block' : 'none';
    });
});