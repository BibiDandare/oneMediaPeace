/*document.addEventListener('DOMContentLoaded', function() {
    var commentButton = document.getElementById('commentsButton');
    var commentForm = document.querySelector('.commentForm');

    commentButton.addEventListener('click', function() {
      commentForm.style.display = commentForm.style.display === 'none' ? 'block' : 'none';
    });
});*/

document.addEventListener('DOMContentLoaded', function() {
  var commentsDiplayButtons = document.querySelectorAll('#commentsDiplayButton');
  var commentsButtons = document.querySelectorAll('#commentsButton');
  var commentDivs = document.querySelectorAll('.commentDiv');

  commentsDiplayButtons.forEach(function(button, index) {
      button.addEventListener('click', function() {
          commentDivs[index].style.display = commentDivs[index].style.display === 'none' ? 'block' : 'none';
      });
  });

  commentsButtons.forEach(function(button, index) {
      button.addEventListener('click', function() {
          var commentForm = commentDivs[index].previousElementSibling;
          commentForm.style.display = commentForm.style.display === 'none' ? 'block' : 'none';
      });
  });
});
