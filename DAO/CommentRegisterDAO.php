<?php
    //require_once("../app/View/ArticleView.php");
    //require_once("../app/Model/CommentModel.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $content = $_POST["commentWritingText"];
    
        if (empty($content))
        {
            echo "Les champs doivent obligatoire être remplis";
        }
        else
        {
            $comment = new CommentModel($this->article, 
                         $_POST['commentWritingText']);
            $comment->setTmp_id_article($this->article->getTmp_id());
            //$comment->setTmp_id_account($this->article->getTpm_id());
            $comment->setTmp_id_account($this->article->getAccount()->getTmp_id());


            //echo $comment->getTmp_id_account();

            //require_once("ArticleController.php");
            //save in the database, and add to Account articles[]
    
            echo "Votre commentaire a bien été publié ✅";
        }

        $dsn = 'mysql:host=localhost;dbname=esgi';
        $username = 'root';
        $password = 'root'; 

        try
        {

            $db = new PDO($dsn, $username, $password);

            $query = $db->prepare("INSERT INTO Comment (id, account_id, 
                            article_id, content, creation_date, modification_date, 
                            moderated, deleted, public, active) VALUES (:id, :account_id,
                            :article_id, :content, :creation_date, 
                            :modification_date, :moderated, :deleted, :public, :active)");

            $id = $comment->getId();
            $account_id = $comment->getTmp_id_account();
            $article_id = $comment->getTmp_id_article();
            $content = $comment->getText();  

            $date = $comment->getCreationDate();
            $date_1 = DateTime::createFromFormat('m/d/Y h:i:s a', $date);
            $date_2 = $date_1->format('Y-m-d H:i:s');

            $modif_date = $comment->getModificationDate();
            $modif_date_1 = DateTime::createFromFormat('m/d/Y h:i:s a', $modif_date);
            $modif_date_2 = $modif_date_1->format('Y-m-d H:i:s');

            $moderated = $comment->getModerated();
            $deleted = $comment->getDeleted();
            $public = $comment->getPublic();
            $active = $comment->getActive();


            // Liaison des paramètres
            $query->bindParam(':id', $id);
            $query->bindParam(':account_id', $account_id);
            $query->bindParam(':article_id', $article_id);
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

    }
    
    

?>