<?php

    // connexion database
    $dsn = 'mysql:host=localhost;dbname=esgi';
    $username = 'root';
    $password = 'root'; 

    try
    {

        $db = new PDO($dsn, $username, $password);

        $query = $db->prepare("INSERT INTO Account (id, account_password, 
                          username, email, creation_date, account_rights, 
                          account_status) VALUES (:id, :account_password,
                          :username, :email, :creation_date, 
                          :account_rights, :account_status)");

        $id = $account->getId();
        $username = $account->getUsername();
        $email = $account->getEmail();
        $password = $account->getPassword();

        $date = $account->getCreationDate();
        $date_1 = $date = DateTime::createFromFormat('m/d/Y h:i:s a', $date);
        $date_2 = $date_1->format('Y-m-d H:i:s');

        $rights = $account->getAccount_rights();
        $status = $account->getStatus();

        // Liaison des paramètres
        $query->bindParam(':id', $id);
        $query->bindParam(':username', $username);
        $query->bindParam(':email', $email);
        $query->bindParam(':account_password', $password);
        $query->bindParam(':creation_date', $date_2);
        $query->bindParam(':account_rights', $rights);
        $query->bindParam(':account_status', $status);




        // Exécution de la requête
        $query->execute();
        echo "connexion réussie";

    }
    catch (PDOException $e)
    {
        echo "Erreur de connexion à la base de données : " 
             . $e->getMessage();
    }


?>