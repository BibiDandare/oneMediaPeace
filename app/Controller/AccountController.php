<?php

    require_once "../app/Model/AccountModel.php";
    //echo "here";

    class AccountController
    {
        public function handle()
        {
            $account = new AccountModel($_POST['email'],
                               $_POST['signInPassword'], 
                              $_POST['signInUsername']);

            // connexion database
            $dsn = 'mysql:host=localhost;dbname=esgi';
            $username = 'root';
            $password = 'root'; 

            try
            {

                $db = new PDO($dsn, $username, $password);
            
                echo "connexion réussie";
                /*
                $query = $db->prepare("INSERT INTO Account (username, email, password) VALUES (:username, :email, :password)");

                $username = $account->getUsername();
                $email = $account->getEmail();
                $password = $account->getPassword();
                $date = $account->getCreationDate();
                $rights = $account->getAccount_rights();
                $status = $account->getStatus();

                // Liaison des paramètres
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':account_password', $password);
                $stmt->bindParam(':creation_date', $date);
                $stmt->bindParam(':account_rights', $rights);
                $stmt->bindParam(':account_status', $status);




                // Exécution de la requête
                $query->execute();
                */
            } catch (PDOException $e) {
                echo "Erreur de connexion à la base de données : " 
                     . $e->getMessage();
            }
        }

    }

    $account = new AccountController();
    $account->handle();
   
?>