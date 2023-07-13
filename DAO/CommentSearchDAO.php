<?php
    //echo "connexion réussie";
    //require_once("../app/Model/CommentModel.php");
    
    $dsn = 'mysql:host=localhost;dbname=esgi';
    $username = 'root';
    $password = 'root';

    $number = $article->getId();

    try
    {
        $db = new PDO($dsn, $username, $password);
        $query = $db->prepare("SELECT * FROM Comment WHERE article_id = :articleId");
        $query->bindValue(':articleId', $number, PDO::PARAM_INT);

        $comments_1 = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($comments_1 as $comment) {
            $id = $comment['id'];
            $accountId = $comment['account_id'];
            $articleId = $comment['article_id'];
            $content = $comment['content'];
            $creationDate = $comment['creation_date'];
            $modificationDate = $comment['modification_date'];
            $moderated = $comment['moderated'];
            $deleted = $comment['deleted'];
            $public = $comment['public'];
            $active = $comment['active'];

            $my_comment = new CommentModel($article, $content);
            $my_comment->setTmp_id_account($article->getAccount()->getTmp_id());
            $my_comment->setTmp_id_article($article->getTmp_id());
            $my_comment->setCreationDate($creationDate);
            $my_comment->setModificationDate($modificationDate);
            $my_comment->setModerated($moderated);
            $my_comment->setDeleted($deleted);
            $my_comment->setPublic($public);
            $my_comment->setActive($active);

            array_push($comments, $my_comment);
        }
    }
    catch(PDOException $e)
    {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }


?>