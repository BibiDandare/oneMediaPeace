<?php
    //echo "connexion réussie";
    
    // connexion database
    $dsn = 'mysql:host=localhost;dbname=esgi';
    $username = 'root';
    $password = 'root'; 

    try
    {

        $db = new PDO($dsn, $username, $password);

        $query = $db->prepare("INSERT INTO Account (account_password, 
                          username, email, creation_date, account_rights, 
                          banned, reported, active) VALUES (:account_password,
                          :username, :email, :creation_date, 
                          :account_rights, :banned, :reported, :active)");

        //$id = $account->getId();
        $username = $account->getUsername();
        $email = $account->getEmail();

        // password hashed
        $password = $account->getPassword();
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $date = $account->getCreationDate();
        $date_1 = DateTime::createFromFormat('m/d/Y h:i:s a', $date);
        $date_2 = $date_1->format('Y-m-d H:i:s');

        $rights = $account->getAccount_rights();
        //$status = $account->getStatus();
        $banned = $account->getBanned();
        $reported = $account->getReported();
        $active = $account->getActive();

        // Liaison des paramètres
        //$query->bindParam(':id', $id);
        $query->bindParam(':username', $username);
        $query->bindParam(':email', $email);
        $query->bindParam(':account_password', $hashedPassword);
        $query->bindParam(':creation_date', $date_2);
        $query->bindParam(':account_rights', $rights);
        //$query->bindParam(':account_status', $status);
        $query->bindParam(':banned', $banned, PDO::PARAM_BOOL);
        $query->bindParam(':reported', $reported, PDO::PARAM_BOOL);
        $query->bindParam(':active', $active, PDO::PARAM_BOOL);






        // Exécution de la requête
        $query->execute();

        //$_SESSION['currentAccount'] = serialize($account);

    }
    catch (PDOException $e)
    {
        echo "Erreur de connexion à la base de données : " 
             . $e->getMessage();
    }

?>