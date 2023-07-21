<?php
    //echo "connexion réussie";
    
    // connexion database
    $dsn = 'mysql:host=localhost;dbname=esgi';
    $username = 'biram';
    $password = 'biramdb'; 

    try
    {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $currentAccountId = $account->getTmp_id();

        $query = "SELECT * FROM Article WHERE account_id = $currentAccountId";
        $query_1 = $db->query($query);

        if ($query_1->rowCount() > 0)
        {
            $db_articles = $query_1->fetchAll(PDO::FETCH_ASSOC);

            foreach ($db_articles as $article)
            {
                $id = $article['id'];
                $accountId = $article['account_id'];
                $title = $article['title'];
                $content = $article['content'];
                $creationDate = $article['creation_date'];
                $modificationDate = $article['modification_date'];
                $moderated = $article['moderated'];
                $deleted = $article['deleted'];
                $public = $article['public'];
                $active = $article['active'];

                $a = new ArticleModel($account, $content, $title);
                $a->setTmp_id($id);
                $a->setCreationDate($creationDate);
                $a->setModificationDate($modificationDate);
                $a->setModerated($moderated);
                $a->setDeleted($deleted);
                $a->setPublic($public);
                $a->setActive($active);

                array_push($articles, $a);
            }
        }


    }
    catch (PDOException $e)
    {
        echo "Erreur de connexion à la base de données : " 
             . $e->getMessage();
    }


?>
