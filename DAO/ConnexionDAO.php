<?php
    //echo "connexion réussie";
    
    // connexion database
    $dsn = 'mysql:host=localhost;dbname=esgi';
    $username = 'root';
    $password = 'root'; 

    try
    {
        $db = new PDO($dsn, $username, $password);
    }
    catch (PDOException $e)
    {
        echo "Erreur de connexion à la base de données : " 
             . $e->getMessage();
    }

    $email    = $_POST['email'];
    $password = $_POST['password'];

    $query = $db->prepare("SELECT * FROM Account WHERE email = :email");
    $query->bindParam(':email', $email);
    $query->execute();

    // Vérification du résultat de la requête
    if ($query->rowCount() > 0)
    {
        $account = $query->fetch(PDO::FETCH_ASSOC);
        $hashedPassword = $account['account_password'];

        // Vérification du mot de passe
        if (password_verify($password, $hashedPassword))
        {
            echo "Connexion réussie ! ";

            //$_SESSION['userId'] = $account['id'];
            $_SESSION['username'] = $account['username'];
            $_SESSION['email'] = $account['email'];
            $_SESSION['password'] = $account['account_password'];
            //header('http://localhost:8888');

            require_once("../app/Model/AccountModel.php");

            $currentAccount = new AccountModel($account['email'],
                                            $account['username'],
                                    $account['account_password']);

            $currentAccount->setTmp_id($account['id']);
            $currentAccount->setCreationDate($account['creation_date']);
            $currentAccount->setAccount_rights($account['account_rights']);
            $currentAccount->setBanned($account['banned']);
            $currentAccount->setReported($account['reported']);
            $currentAccount->setActive($account['active']);

            $_SESSION['currentAccount'] = serialize($currentAccount);

        }
        else
        {
            echo "Votre mot de passe est incorrect ☹️!";
            exit();
        }
    }
    else
    {
        echo "Il semble que vous n'ayez pas encore de compte, 
                                   veuillez vous inscrire!☺️";
        exit();
    }
?>