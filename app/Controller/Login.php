<div class="loginForm">
    <form method="POST" action="">
        <label for="username">Username : </label>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Password : </label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Se connecter">
    </form>
</div>

<?php
    //aller chercher les mots de passe dans la database puis tester????
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        if ($_POST['username'] == 'user' &&
            $_POST['password'] == 'user')
        {
            // redirection vers le dashboard

            echo "<div class='loginAllowed'>Bienvenue</div>";
            exit;
        }
        else
        {
            echo "<div class='loginDenied'>Les informations sont incorrectes.</div>";
        }
    }
?>