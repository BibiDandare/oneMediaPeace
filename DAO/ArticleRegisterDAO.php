<?php
    
    $dsn = 'mysql:host=localhost;dbname=esgi';
    $username = 'biram';
    $password = 'biramdb'; 

    try
    {

        $db = new PDO($dsn, $username, $password);

        $query = $db->prepare("INSERT INTO Article (account_id, 
                          title, content, creation_date, modification_date, 
                          moderated, deleted, public, active) VALUES (:account_id,
                          :title, :content, :creation_date, 
                          :modification_date, :moderated, :deleted, :public, :active)");

        //$id = $article->getId();
        $account_id = $article->getAccount()->getTmp_id();
        $title = $article->getTitle();
        $content = $article->getText();        

        $date = $article->getCreationDate();
        $date_1 = DateTime::createFromFormat('m/d/Y h:i:s a', $date);
        $date_2 = $date_1->format('Y-m-d H:i:s');

        $modif_date = $article->getModificationDate();
        $modif_date_1 = DateTime::createFromFormat('m/d/Y h:i:s a', $modif_date);
        $modif_date_2 = $modif_date_1->format('Y-m-d H:i:s');

        $moderated = $article->getModerated();
        $deleted = $article->getDeleted();
        $public = $article->getPublic();
        $active = $article->getActive();


        // Liaison des paramètres
        //$query->bindParam(':id', $id);
        $query->bindParam(':account_id', $account_id);
        $query->bindParam(':title', $title);
        $query->bindParam(':content', $content);
        $query->bindParam(':creation_date', $date_2);
        $query->bindParam(':modification_date', $modif_date_2);
        $query->bindParam(':moderated', $moderated, PDO::PARAM_BOOL);
        $query->bindParam(':deleted', $deleted, PDO::PARAM_BOOL);
        $query->bindParam(':public', $public, PDO::PARAM_BOOL);
        $query->bindParam(':active', $active, PDO::PARAM_BOOL);


        // Exécution de la requête
        $query->execute();

    }
    catch (PDOException $e)
    {
        echo "Erreur de connexion à la base de données : " 
             . $e->getMessage();
    }

?>
