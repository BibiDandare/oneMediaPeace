<div class="loginForm">
    <form method="POST" action="">
    <label for="email">Adresse mail : </label>
        <input type="text" id="email" name="email"><br><br>
        <label for="password">Password : </label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Se connecter">
    </form>
</div>

<?php
    //aller chercher les mots de passe dans la database puis tester????
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        $email    = $_POST['email'];
        //$password = $_POST['password'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            echo "<div class='emailError'>Votre adresse mail est mal
                   formée.</div>";
            exit();
        }

        require_once("../DAO/ConnexionDAO.php");
        /*
        if ($_POST['username'] == 'user' &&
            $_POST['password'] == 'user')
        {
            //require_once("../app/Controller/AccountController.php");
            // $_SESSION = ...

            echo "<div class='loginAllowed'>Bienvenue</div>";

            // redirection vers le dashboard

            exit;
        }
        else
        {
            echo "<div class='loginDenied'>Les informations sont incorrectes.</div>";
        }
        */

        //redirection dashboard
    }
?>