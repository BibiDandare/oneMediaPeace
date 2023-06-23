<div class="loginForm inscriptionForm">
    <form method="POST" action="">
        <label for="email">Adresse mail : </label>
        <input type="text" id="email" name="email"><br><br>

        <label for="signInUsername">Username : </label>
        <input type="text" id="signInUsername" name="signInUsername"><br><br>
        <label for="signInPassword">Password : </label>
        <input type="password" id="signInPassword" name="signInPassword"><br><br>
        <input type="submit" value="Se connecter">
    </form>
</div>

<?php
    //aller chercher les mots de passe dans la database puis tester????
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        $email = $_POST['email'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            echo "<div class='emailError'>Votre adresse mail est mal
                   formée.</div>";
            exit();
        }
        
        /*if ($_POST['signInUsername'] == 'user' &&
            $_POST['signInPassword'] == 'user' &&
            $_POST['email']    == 'user')*/
        if(isset($_POST['signInUsername']) && isset($_POST['signInPassword'])
                                           && isset($_POST['email']))
        {
            // redirection vers le dashboard
            
            $_SESSION['signInUsername'] = $_POST['signInUsername'];
            $_SESSION['signInPassword'] = $_POST['signInPassword'];
            $_SESSION['email'] = $_POST['email'];
            
            echo "<div class='inscriptionPassed'>Votre inscription à 
                   bien été prise en compte</div>";
            echo "<br>";

            require_once("../app/Controller/AccountController.php");

            //exit;
        }
        else
        {
            echo "<div class='inscriptionFailed'>Les informations sont 
                   imcomplètes.</div>";
        }
    }
?>