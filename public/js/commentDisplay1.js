function toggleComment(commentId) {
    var commentContent = document.getElementById('content-' + commentsDiplayButton);
    var showHideLink = document.getElementById('show-hide-' + commentsDiplayButton);

    if (commentContent.style.display === 'none') {
        commentContent.style.display = 'block';
        showHideLink.innerText = 'Hide';
    } else {
        commentContent.style.display = 'none';
        showHideLink.innerText = 'Show';
    }
}