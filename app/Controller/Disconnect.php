<?php
    //session_abort();
    $_SESSION['username'] = null;
    $_SESSION['password'] = null;

    sleep(2);

    echo "
    <script>
        window.location.href = 'http://biram.c2lr.eu/?articles';
    </script>
    ";

    exit();
?>